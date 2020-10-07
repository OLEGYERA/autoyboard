<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BasicController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\UkrainianRegionPart;
use App\UkrainianRegion;
use App\UkrainianCity;


class RegionController extends BasicController
{
    public function GET_region(Request $request){

        $requests = $this->RequestExplode($request);

        //selecting
        $selecting_query = ['id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }
        //end selecting

        $regions = [];

//        dd(intval($requests['regionStage']), $requests['regionStage']);

        if(intval($requests['regionStage']) > 3) return $this->JSON($regions,200);

        switch ($requests['regionStage']){
            case 1:
                if($requests['children']) {
                    foreach (UkrainianRegionPart::select($selecting_query)->get() as $urp) {
                        $urp->children = $urp->regions()->select($selecting_query)->get();
                        array_push($regions, $urp);
                    }
                }
                else{
                    array_push($regions, UkrainianRegionPart::select($selecting_query)->get()) ;
                }
                break;
            case 2:
                if($requests['children']) {
                    foreach (UkrainianRegion::select($selecting_query)->get() as $ur) {
                        $ur->children = $ur->cities()->select($selecting_query)->get();
                        array_push($regions, $ur);
                    }
                }
                else{
                    array_push($regions, UkrainianRegion::select($selecting_query)->get());
                }
                break;
            case 3:
                array_push($regions, UkrainianCity::select($selecting_query)->get());
                break;
            default:
                foreach (UkrainianRegionPart::select($selecting_query)->get() as $urp){
                    $region_part = [];
                    foreach ($urp->regions()->select($selecting_query)->get() as $ur){
                        $ur->children = $ur->cities()->select($selecting_query)->orderBy('created_at', 'asc')->get();
                        array_push($region_part, $ur);
                    }
                    $urp->children = $region_part;
                    array_push($regions, $urp);
                }
                break;
        }






        return $this->JSON($regions,200);

    }
}
