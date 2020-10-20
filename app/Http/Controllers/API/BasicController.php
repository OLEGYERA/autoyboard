<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class BasicController
{

    protected function RequestExplode($request){
        $requests = [];

        $requests = Arr::add($requests, 'langType', $this->detectingLanguage($request->langType));
        $requests = Arr::add($requests, 'alias', ($request->alias === "1") ? 1 : 0);
        $requests = Arr::add($requests, 'query', $request->q);
        $requests = Arr::add($requests, 'regionStage', $request->regionStage);
        $requests = Arr::add($requests, 'children', ($request->children === "1") ? 1 : 0);
        $requests = Arr::add($requests, 'manufacture', ($request->manufactureID === "1") ? 1 : 0);

        return $requests;
    }


    protected function detectingLanguage($id = null, $forForm = true){
        switch ($id){
            case 1:
                return $forForm ? 'title' : 'en';
            case 2:
                return $forForm ? 'utitle' : 'ua';
            case 3:
            default:
                return $forForm ? 'rtitle' : 'ru';
        }
    }

    protected function JSON($DATA, $STATUS){
//        dd(response()->json($DATA, $STATUS, [
////            'Content-type'=>'application/json',
////            'Charset' => 'utf-8',
////            'Access-Control-Allow-Headers' => '*',
////            'Access-Control-Allow-Origin' => '*',
////            'Access-Control-Allow-Methods' => '*',
//        ], JSON_UNESCAPED_UNICODE)
//            );
////        dd(4);
// dd(headers_list());
        return response()->json($DATA, $STATUS, [
            'Content-type'=>'application/json',
            'Charset' => 'utf-8',
//            'Access-Control-Allow-Headers' => '*',
//            'Access-Control-Allow-Origin' => '*',
//            'Access-Control-Allow-Methods' => '*',
        ], JSON_UNESCAPED_UNICODE);
//            ->withHeaders(['Access-Control-Allow-Methods' => '*',
//                'Access-Control-Allow-Origin' => '*',
//                'Access-Control-Allow-Headers' => '*']);
    }
}
