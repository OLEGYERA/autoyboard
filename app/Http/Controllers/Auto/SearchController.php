<?php

namespace App\Http\Controllers\Auto;
use App\Http\Controllers\Auto\ExchangeRatesController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\ParserUrlList;
use App\UkrainianRegion;
use App\UkrainianCity;

class SearchController extends Controller
{
    public function dataCollection($search_request){
//      Create Query
        $query = ParserUrlList::where('status', 3);
//      Condition
        $autoCondition = $search_request['searchDetailFullStore']['autoConditionChoosed'];
        if($autoCondition !== 1) $query = $query->where('autoCondition', $autoCondition);
//      TransportType
        $transportType = $search_request['transportFullStore']['typeChoosed'];
        $query = $query->where('transport_type', $transportType);
//      Currency
        $query = $this->currencyQuery($query, $search_request['searchDetailFullStore']['priceChoosed']);
//      Photos
        $query = $search_request['searchDetailFullStore']['searchPropsChoosed']['withPhoto'] ? $query->has('photos') : $query->has('photos', 'NOT');
//      SearchProps
        $query = $query->whereHas('main', function ($q) use ($search_request) {
            if($search_request['searchDetailFullStore']['searchPropsChoosed']['bargain']){
                $q->where('bargain', $search_request['searchDetailFullStore']['searchPropsChoosed']['bargain']);
            }
            if($search_request['searchDetailFullStore']['searchPropsChoosed']['exchange']){
                $q->where('exchange', $search_request['searchDetailFullStore']['searchPropsChoosed']['exchange']);
            }
            $q->where('abroad', $search_request['searchDetailFullStore']['searchPropsChoosed']['abroad']);
            $q->where('credit', $search_request['searchDetailFullStore']['searchPropsChoosed']['credit']);
            $q->where('customsСleared', $search_request['searchDetailFullStore']['searchPropsChoosed']['customsСleared']);
            $q->where('accident', $search_request['searchDetailFullStore']['searchPropsChoosed']['accident']);
            $q->where('noMotion', $search_request['searchDetailFullStore']['searchPropsChoosed']['noMotion']);
        });
//      Colors
        $colorsChoosed = $search_request['transportFullStore']['colorsChoosed'];
        if(count($colorsChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($colorsChoosed) {
                $q->whereIn('color_id', $colorsChoosed);
            });
        }
//      TransportType
        $query = $query->where('transport_type', $transportType);
//      Bodies
        $bodiesChoosed = $search_request['transportFullStore']['bodiesChoosed'];
        if(count($bodiesChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($bodiesChoosed) {
                $q->whereIn('body_id', $bodiesChoosed);
            });
        }
//      Cities
        if(isset($search_request['regionFullStore'])){
            $regions = $search_request['regionFullStore']['choosedRegions'];
            $cities_query = [];
            $citiesChoosed = [];
            if(isset($regions) && count($regions) > 0){
                foreach($regions as $region){
                    $ur = UkrainianRegion::select('id as val')->find($region);
                    if($ur == null) continue;
                    $cities_query = Arr::add($cities_query, $ur->val, $ur->cities()->pluck('id')->toArray());
                }
            }

            $cities = $search_request['regionFullStore']['choosedCities'];
            if(isset($cities) && count($cities) > 0){
                $cityTempSort = [];
                foreach($cities as $city){
                    $uc = UkrainianCity::find($city);
                    if($uc == null) continue;
                    $ur = $uc->region;
                    if(!isset($cityTempSort[$ur->id])){
                        $cityTempSort = Arr::add($cityTempSort, $ur->id, [$uc->id]);
                    } else {
                        array_push($cityTempSort[$ur->id], $uc->id);
                    }
                }

                foreach($cityTempSort as $key=>$sort){
                    $cities_query[$key] = $sort;
                }
            }

            foreach(array_values($cities_query) as $arr){
                $citiesChoosed = array_merge($citiesChoosed, $arr);
            }

            if(count($citiesChoosed) > 0){
                $query = $query->whereHas('main', function ($q) use ($citiesChoosed) {
                    $q->whereIn('city_id', $citiesChoosed);
                });
            }
        }
//      Manufacture
        $importersChoosed = $search_request['transportFullStore']['importersChoosed'];
        if(count($importersChoosed) > 0){
            $query = $query->whereHas('main', function ($q) use ($importersChoosed) {
                $q->whereIn('manufacture_id', $importersChoosed);
            });
        }
//      States
        $statesChoosed = $search_request['transportFullStore']['statesChoosed'];
        if(count($statesChoosed) > 0){
            foreach ($statesChoosed as $state){
                $query = $query->whereHas('state', function ($q) use ($state) {
                    $q->where('state_id', $state);
                });
            }

        }
//      Fuels
        $fuelsChoosed = $search_request['transportFullStore']['fuelsChoosed'];
        if(count($fuelsChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($fuelsChoosed) {
                $q->whereIn('fuel_id', $fuelsChoosed);
            });
        }
//      Fuel Consumtion
        $fuelConsumptionChoosed = $search_request['transportFullStore']['fuelConsumptionChoosed'];
        if($fuelConsumptionChoosed['from'] !== null && $fuelConsumptionChoosed['to']) {
            $query = $query->whereHas('body', function ($q) use ($fuelConsumptionChoosed) {
                $q->whereBetween('cons_mixed', [$fuelConsumptionChoosed['from'], $fuelConsumptionChoosed['to']]);
            });
        }



        return $query->get();


//        $merge = ParserUrlList::where('id',  '<=',  10)->get()->merge(ParserUrlList::where('id', '=', 1)->get());

//        dd($merge()->where('id', 7)->get());
    }


    public function currencyQuery($query, $currency){
        if($currency['to'] !== null && $currency['from'] !== null){
            $exchangeRates = (new ExchangeRatesController)->generateMultyRate($currency);
            return $query->whereHas('main', function ($q) use ($exchangeRates) {
                $q->where(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 1);
                    $qr->whereBetween('price_value', [$exchangeRates['USD']['from'], $exchangeRates['USD']['to']]);
                })->orWhere(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 2);
                    $qr->whereBetween('price_value', [$exchangeRates['UAH']['from'], $exchangeRates['UAH']['to']]);
                })->orWhere(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 3);
                    $qr->whereBetween('price_value', [$exchangeRates['EUR']['from'], $exchangeRates['EUR']['to']]);
                });
            });
        } elseif ($currency['to'] !== null){
            $exchangeRates = (new ExchangeRatesController)->generateMultyRate($currency);
            return $query->whereHas('main', function ($q) use ($exchangeRates) {
                $q->where(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 1);
                    $qr->where('price_value', '<=', $exchangeRates['USD']['to']);
                })->orWhere(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 2);
                    $qr->where('price_value', '<=', $exchangeRates['UAH']['to']);
                })->orWhere(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 3);
                    $qr->where('price_value', '<=', $exchangeRates['EUR']['to']);
                });
            });
        } elseif ($currency['from'] !== null){
            $exchangeRates = (new ExchangeRatesController)->generateMultyRate($currency);
            return $query->whereHas('main', function ($q) use ($exchangeRates) {
                $q->where(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 1);
                    $qr->where('price_value', '>=', $exchangeRates['USD']['from']);
                })->orWhere(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 2);
                    $qr->where('price_value', '>=', $exchangeRates['UAH']['from']);
                })->orWhere(function ($qr) use ($exchangeRates) {
                    $qr->where('price_currency', 3);
                    $qr->where('price_value', '>=', $exchangeRates['EUR']['from']);
                });
            });
        }

        return $query;
    }
}

//if(count($citiesChoosed) > 0){
//    $query = $query->whereHas('main', function ($mainQuery) use ($citiesChoosed) {
//        $mainQuery->whereHas('city', function ($q) use ($citiesChoosed) {
//            $q->whereIn('city_id', $citiesChoosed);
//        });
//    });
//    return $query->get();
//}
