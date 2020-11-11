<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BasicController;
use App\Http\Controllers\System\UriValidatorController as UVC;
use App\Http\Controllers\System\SearchController as SC;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class SearchController extends BasicController{

    public function getCountTransport(Request $request){
        $search_request = (new UVC)->validateSearch($request->all(), 'rtitle', true);
        $result = (new SC)->dataCollection($search_request);

        return response()->json($result->count(), 200);
    }

}

