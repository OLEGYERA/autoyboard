<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BasicController;
use App\Http\Controllers\System\UriValidatorController as UVC;
use App\Http\Controllers\System\SearchController as SC;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\ParserUrlList;

class SearchController extends BasicController{

    public function getCountTransport(Request $request){
        $search_request = (new UVC)->validateSearch($request->all(), 'rtitle');
        $result = (new SC)->dataCollection($search_request, true);

        return response()->json($result, 200);
    }


    public function getDataTransports(Request $request){
        $search_request = (new UVC)->validateSearch($request->all(), 'rtitle');
        $result = (new SC)->dataCollection($search_request, false);
        return response()->json($result, 200);
    }

}

