<?php

namespace App\Http\Controllers\Auto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\ParserUrlList;
use App\UkrainianRegion;
use App\UkrainianCity;

class SearchController extends Controller
{
    public function dataCollection($search_request){
        $autoCondition = $search_request['searchDetailFullStore']['autoConditionChoosed'];
        $transportType = $search_request['transportFullStore']['typeChoosed'];

        $query = ParserUrlList::where('status', 3);
        $r = $query;

//      Condition
        if($autoCondition !== 1) $query = $query->where('autoCondition', $autoCondition);
        $query = $query->where('transport_type', $transportType);

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

////      Photos
//        $query = $query->when('photos', function ($q) use ($search_request) {
//            $q->where('id', '>=', 1);
//        });


//      TransportType
        $query = $query->where('transport_type', $transportType);

//      Bodies
        $bodyChoosed = $search_request['transportFullStore']['bodiesChoosed'];
        if(count($bodyChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($bodyChoosed) {
                $q->whereIn('body_id', $bodyChoosed);
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

//      Colors
        $colorsChoosed = $search_request['transportFullStore']['colorsChoosed'];
        if(count($colorsChoosed) > 0){
            $query = $query->whereHas('body', function ($q) use ($colorsChoosed) {
                $q->whereIn('color_id', $colorsChoosed);
            });
        }

        return $query->get()->count();


//        $merge = ParserUrlList::where('id',  '<=',  10)->get()->merge(ParserUrlList::where('id', '=', 1)->get());

//        dd($merge()->where('id', 7)->get());



//        ParserUrlList::where('')
        return $query->get()->count();
    }


    public function cardTest($id){


//        dd($base->other);


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
