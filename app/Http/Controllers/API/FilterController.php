<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BasicController;
use Illuminate\Http\Request;

use App\TransportType;

class FilterController extends BasicController
{
//langType
    public function GET_transport_types(Request $request){

        $requests = $this->RequestExplode($request);

        $selecting_data = TransportType::select(['id as val', $requests['langType'] . ' as name']);

        if($requests['alias']){
            $selecting_data->addSelect('alias');
        }


        return $this->JSON($selecting_data->get(),200);
    }

    public function GET_transport_type($id, Request $request, $inside = false){

        $requests = $this->RequestExplode($request);

        $transportType = TransportType::where('id', $id)->select(['id as val', $requests['langType'] . ' as name']);

        if($requests['alias']){
            $transportType->addSelect('alias');
        }

        $tt = $transportType->first();
        return  (!$inside) ? $this->JSON(empty($tt) ? [] : $tt,200) : $tt;

    }


    public function GET_transport_brands($id, Request $request){

        $tt = $this->GET_transport_type($id, $request, true);
        if(empty($tt)) return $this->JSON([],200);

        $requests = $this->RequestExplode($request);

        $selecting_query = ['brands.id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }

        $brands = $tt->brands()->select($selecting_query)->get();

        return $this->JSON(empty($brands) ? [] : $brands,200);
    }

    public function GET_transport_brand($id, $brand_id, Request $request, $inside = false){

        $tt = $this->GET_transport_type($id, $request, true);
        if(empty($tt)) return $this->JSON([],200);

        $requests = $this->RequestExplode($request);

        $selecting_query = ['brands.id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }

        $brand = $tt->brand()->where('brands.id', $brand_id)->select($selecting_query)->first();

        return (!$inside) ? $this->JSON(empty($brand) ? [] : $brand,200) : $brand;
    }

    public function GET_transport_models($id, $brand_id, Request $request, $inside = false){

        $brand = $this->GET_transport_brand($id, $brand_id, $request, true);
        if(empty($brand)) return $this->JSON([],200);

        $requests = $this->RequestExplode($request);

        $selecting_query = ['id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }

        $models = $brand->modelsWithTransportType($id)->select($selecting_query)->get();

        return $this->JSON(empty($models) ? [] : $models,200);
    }




}

