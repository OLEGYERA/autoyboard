<?php

namespace App\Http\Controllers\Auto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ParserUrlList;

class SearchController extends Controller
{
    public function dataCollection($search_request){
        $autoCondition = $search_request['searchDetailFullStore']['autoConditionChoosed'];
        $transportType = $search_request['transportFullStore']['typeChoosed'];

        $query = ParserUrlList::where('status', 3);

        if($autoCondition !== 1) $query = $query->where('autoCondition', $autoCondition);
        $query = $query->where('transport_type', $transportType);

        $query = $query->whereHas('body', function ($q){
            $q->whereIn('body_id', [1,3]);
        });



//        ParserUrlList::where('')
        return $query->get()->count();
    }
}
