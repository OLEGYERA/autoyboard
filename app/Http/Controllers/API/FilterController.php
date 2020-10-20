<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BasicController;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\TransportType;
use App\ManufactureCountry;

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

    public function GET_transport_bodies($id, Request $request){
        $tt = $this->GET_transport_type($id, $request, true);
        if(empty($tt)) return $this->JSON([],200);

        $requests = $this->RequestExplode($request);

        $selecting_query = ['id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }

        $bodies = $tt->bodies()->select($selecting_query)->get();

        return $this->JSON(empty($bodies) ? [] : $bodies,200);
    }


    public function GET_transport_brands($id, Request $request){

        $tt = $this->GET_transport_type($id, $request, true);
        if(empty($tt)) return $this->JSON([],200);

        $requests = $this->RequestExplode($request);

        $selecting_query = ['brands.id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }

        if($requests['manufacture']){
            array_push($selecting_query, 'manufacture_id as manufacture');
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

        if($requests['children']){
            array_push($selecting_query, 'parent_id');

            $sorting_parent_arr = [];
            $sorting_child_arr = [];
            $sorting_final_arr = [];


            foreach($brand->modelsWithTransportType($id)->select($selecting_query)->where('parent_id', null)->get() as $model){
                $sorting_parent_arr = Arr::add($sorting_parent_arr, $model->val, $model);
            }

            foreach($brand->modelsWithTransportType($id)->select($selecting_query)->where('parent_id', '!=', null)->get() as $model){
                if(!isset($sorting_child_arr[$model->parent_id])){
                    $sorting_child_arr = Arr::add($sorting_child_arr, $model->parent_id, [$model]);
                }
                else{
                    $sorting_child_arr = Arr::add($sorting_child_arr, $model->parent_id, [$model]);
                    array_push($sorting_child_arr[$model->parent_id], $model);
                }
            }

            foreach ($sorting_parent_arr as $key=>$parent){
                if(!isset($sorting_child_arr[$key])){
                    $parent->children = [];
                }
                else{
                    $parent->children = $sorting_child_arr[$key];
                }
                array_push($sorting_final_arr, $parent);
            }
            $models = $sorting_final_arr;
        }
        else{
            $models = $brand->modelsWithTransportType($id)->select($selecting_query)->get();
        }

        return $this->JSON(empty($models) ? [] : $models,200);
    }

    public function GET_transport_model($id, $brand_id, $model_id, Request $request){

        $brand = $this->GET_transport_brand($id, $brand_id, $request, true);
        if(empty($brand)) return $this->JSON([],200);

        $requests = $this->RequestExplode($request);

        $selecting_query = ['id as val', $requests['langType'] . ' as name'];

        if($requests['alias']){
            array_push($selecting_query, 'alias');
        }


        $model = $brand->modelWithTransportType($id)->where('id', $model_id)->select($selecting_query)->first();


        if($requests['children'] && !empty($model)){

            $model_child = $brand->modelsWithTransportType($id)->select($selecting_query)->where('parent_id', $model_id)->get();

            $model->children = $model_child;
        }

        return $this->JSON(empty($model) ? [] : $model,200);
    }


    public function GET_manufacture_countries(Request $request){

        $requests = $this->RequestExplode($request);

        $selecting_data = ManufactureCountry::select(['id as val', $requests['langType'] . ' as name']);

        if($requests['alias']){
            $selecting_data->addSelect('alias');
        }

        return $this->JSON($selecting_data->get(),200);
    }




}

