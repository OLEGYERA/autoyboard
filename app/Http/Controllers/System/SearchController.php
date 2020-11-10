<?php

namespace App\Http\Controllers\System;
use App\Http\Controllers\System\ExchangeRatesController;
use App\Http\Controllers\Controller;
use App\ManufactureCountry;
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
//      RBMYs
        if(isset($search_request['rbmyFullStore']['rbmys'])){
            $rbmys = $search_request['rbmyFullStore']['rbmys'];
            $query = $query->whereHas('main', function ($q) use ($rbmys) {
                $firstQ = true;
                foreach ($rbmys as $rbmy){
                    if($firstQ){
                        $q->where(function ($qr) use ($rbmy) {
                            if(!empty($rbmy['modelsChoose'])){
                                $qr->whereIn('model_id', $rbmy['modelsChoose']);
                            } elseif ($rbmy['brandChoose'] !== null){
                                $qr->where('brand_id', $rbmy['brandChoose']);
                            } elseif (!empty($rbmy['brands'])){
                                $qr->whereIn('brand_id', $rbmy['brands']->pluck('val')->toArray());
                            }
                            if($rbmy['yearFrom'] !== null && $rbmy['yearTo'] !== null) {
                                $qr->whereBetween('year', [$rbmy['yearFrom'], $rbmy['yearTo']]);
                            } elseif ($rbmy['yearTo'] !== null){
                                $qr->where('year', '<=', $rbmy['yearTo']);
                            } elseif ($rbmy['yearFrom'] !== null){
                                $qr->where('year', '>=', $rbmy['yearFrom']);
                            }
                        });
                        $firstQ = false;
                    } else{
                        $q->orWhere(function ($qr) use ($rbmy) {
                            if(!empty($rbmy['modelsChoose'])){
                                $qr->whereIn('model_id', $rbmy['modelsChoose']);
                            } elseif ($rbmy['brandChoose'] !== null){
                                $qr->where('brand_id', $rbmy['brandChoose']);
                            } elseif (!empty($rbmy['brands'])){
                                $qr->whereIn('brand_id', $rbmy['brands']->pluck('val')->toArray());
                            }

                            if($rbmy['yearFrom'] !== null && $rbmy['yearTo'] !== null) {
                                $qr->whereBetween('year', [$rbmy['yearFrom'], $rbmy['yearTo']]);
                            } elseif ($rbmy['yearTo'] !== null){
                                $qr->where('year', '<=', $rbmy['yearTo']);
                            } elseif ($rbmy['yearFrom'] !== null){
                                $qr->where('year', '>=', $rbmy['yearFrom']);
                            }
                        });
                    }
                }

            });
        }
//      Cities
        if(isset($search_request['regionFullStore']['regions'])){
            $regions = $search_request['regionFullStore']['regions']['choosedRegions'];
            $cities_query = [];
            $citiesChoosed = [];
            if(isset($regions) && count($regions) > 0){
                foreach($regions as $region){
                    $ur = UkrainianRegion::select('id as val')->find($region);
                    if($ur == null) continue;
                    $cities_query = Arr::add($cities_query, $ur->val, $ur->cities()->pluck('id')->toArray());
                }
            }

            $cities = $search_request['regionFullStore']['regions']['choosedCities'];
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
        if($fuelConsumptionChoosed['from'] !== null && $fuelConsumptionChoosed['to'] !== null) {
            $query = $query->whereHas('body', function ($q) use ($fuelConsumptionChoosed) {
                $q->whereBetween('cons_mixed', [$fuelConsumptionChoosed['from'], $fuelConsumptionChoosed['to']]);
            });
        } elseif ($fuelConsumptionChoosed['to'] !== null){
            $query = $query->whereHas('body', function ($q) use ($fuelConsumptionChoosed) {
                $q->where('cons_mixed', '<=', $fuelConsumptionChoosed['to']);
            });
        } elseif ($fuelConsumptionChoosed['from'] !== null){
            $query = $query->whereHas('body', function ($q) use ($fuelConsumptionChoosed) {
                $q->where('cons_mixed', '>=', $fuelConsumptionChoosed['from']);
            });
        }

//      Mileage
        $mileageChoosed = $search_request['transportFullStore']['mileageChoosed'];
        if($mileageChoosed['from'] !== null && $mileageChoosed['to'] !== null) {
            $query = $query->whereHas('body', function ($q) use ($mileageChoosed) {
                $q->whereBetween('mileage', [$mileageChoosed['from'], $mileageChoosed['to']]);
            });
        } elseif ($mileageChoosed['to'] !== null){
            $query = $query->whereHas('body', function ($q) use ($mileageChoosed) {
                $q->where('mileage', '<=', $mileageChoosed['to']);
            });
        } elseif ($mileageChoosed['from'] !== null){
            $query = $query->whereHas('body', function ($q) use ($mileageChoosed) {
                $q->where('mileage', '>=', $mileageChoosed['from']);
            });
        }


//      Transmissions
        $transmissionsChoosed = $search_request['transportFullStore']['transmissionsChoosed'];
        if(count($transmissionsChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($transmissionsChoosed) {
                $q->whereIn('transmission_id', $transmissionsChoosed);
            });
        }

//      Volume
        $volumeChoosed = $search_request['transportFullStore']['volumeChoosed'];
        if($volumeChoosed['from'] !== null && $volumeChoosed['to'] !== null) {
            $query = $query->whereHas('body', function ($q) use ($volumeChoosed) {
                $q->whereBetween('volume', [$volumeChoosed['from'], $volumeChoosed['to']]);
            });
        } elseif ($volumeChoosed['to'] !== null){
            $query = $query->whereHas('body', function ($q) use ($volumeChoosed) {
                $q->where('volume', '<=', $volumeChoosed['to']);
            });
        } elseif ($volumeChoosed['from'] !== null){
            $query = $query->whereHas('body', function ($q) use ($volumeChoosed) {
                $q->where('volume', '>=', $volumeChoosed['from']);
            });
        }

//      Doors
        $doorsChoosed = $search_request['transportFullStore']['doorsChoosed'];
        if($doorsChoosed['from'] !== null && $doorsChoosed['to'] !== null) {
            $query = $query->whereHas('body', function ($q) use ($doorsChoosed) {
                $q->whereBetween('doors', [$doorsChoosed['from'], $doorsChoosed['to']]);
            });
        } elseif ($doorsChoosed['to'] !== null){
            $query = $query->whereHas('body', function ($q) use ($doorsChoosed) {
                $q->where('doors', '<=', $doorsChoosed['to']);
            });
        } elseif ($doorsChoosed['from'] !== null){
            $query = $query->whereHas('body', function ($q) use ($doorsChoosed) {
                $q->where('doors', '>=', $doorsChoosed['from']);
            });
        }


//      Gears
        $gearsChoosed = $search_request['transportFullStore']['gearsChoosed'];
        if(count($gearsChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($gearsChoosed) {
                $q->whereIn('gear_id', $gearsChoosed);
            });
        }

//      Power
        $powerChoosed = $search_request['transportFullStore']['powerChoosed'];
        if(count($powerChoosed) > 0){
            if($powerChoosed['from'] !== null && $powerChoosed['to'] !== null) {
                $query = $query->whereHas('body', function ($q) use ($powerChoosed) {
                    $q->whereBetween('horse', [$powerChoosed['from'], $powerChoosed['to']]);
                });
            } elseif ($powerChoosed['to'] !== null){
                $query = $query->whereHas('body', function ($q) use ($powerChoosed) {
                    $q->where('horse', '<=', $powerChoosed['to']);
                });
            } elseif ($powerChoosed['from'] !== null){
                $query = $query->whereHas('body', function ($q) use ($powerChoosed) {
                    $q->where('horse', '>=', $powerChoosed['from']);
                });
            }
        }

//      Seats
        $seatsChoosed = $search_request['transportFullStore']['seatsChoosed'];
        if(count($seatsChoosed) > 0){
            if($seatsChoosed['from'] !== null && $seatsChoosed['to'] !== null) {
                $query = $query->whereHas('body', function ($q) use ($seatsChoosed) {
                    $q->whereBetween('seats', [$seatsChoosed['from'], $seatsChoosed['to']]);
                });
            } elseif ($seatsChoosed['to'] !== null){
                $query = $query->whereHas('body', function ($q) use ($seatsChoosed) {
                    $q->where('seats', '<=', $seatsChoosed['to']);
                });
            } elseif ($seatsChoosed['from'] !== null){
                $query = $query->whereHas('body', function ($q) use ($seatsChoosed) {
                    $q->where('seats', '>=', $seatsChoosed['from']);
                });
            }
        }

//      Security
        $securityChoosed = $search_request['transportFullStore']['techsChoosed']['security'];
        if(count($securityChoosed) > 0){
            foreach ($securityChoosed as $security){
                $query = $query->whereHas('security', function ($q) use ($security) {
                    $q->where('security_id', $security);
                });
            }
        }
//      Comfort
        $comfortChoosed = $search_request['transportFullStore']['techsChoosed']['comfort'];
        if(count($comfortChoosed) > 0){
            foreach ($comfortChoosed as $comfort){
                $query = $query->whereHas('comfort', function ($q) use ($comfort) {
                    $q->where('comfort_id', $comfort);
                });
            }
        }
//      Multimedia
        $multimediaChoosed = $search_request['transportFullStore']['techsChoosed']['multimedia'];
        if(count($multimediaChoosed) > 0){
            foreach ($multimediaChoosed as $multimedia){
                $query = $query->whereHas('multimedia', function ($q) use ($multimedia) {
                    $q->where('multimedia_id', $multimedia);
                });
            }
        }
//      Others
        $othersChoosed = $search_request['transportFullStore']['techsChoosed']['others'];
        if(count($othersChoosed) > 0){
            foreach ($othersChoosed as $other){
                $query = $query->whereHas('other', function ($q) use ($other) {
                    $q->where('other_id', $other);
                });
            }
        }
        return $query->get();
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

