<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



$appRoutes = function() {
    Route::get('/transport_types', 'API\FilterController@GET_transport_types');
    Route::get('/transport_types/{id}', 'API\FilterController@GET_transport_type');
    Route::get('/transport_types/{id}/bodies', 'API\FilterController@GET_transport_bodies');
    Route::get('/transport_types/{id}/brands', 'API\FilterController@GET_transport_brands');
    Route::get('/transport_types/{id}/brands/{brand_id}', 'API\FilterController@GET_transport_brand');
    Route::get('/transport_types/{id}/brands/{brand_id}/models', 'API\FilterController@GET_transport_models');
    Route::get('/transport_types/{id}/brands/{brand_id}/models/{model_id}', 'API\FilterController@GET_transport_model');
    Route::get('/transport_types/{id}/transmissions', 'API\FilterController@GET_transport_transmissions');
    Route::get('/transport_types/{id}/gears', 'API\FilterController@GET_transport_gears');
    Route::get('/transport_types/{id}/techs', 'API\FilterController@GET_transport_techs');

    Route::get('/regions', 'API\RegionController@GET_region');
    Route::get('/manufacture_countries', 'API\FilterController@GET_manufacture_countries');

    Route::get('/count_transport', 'API\SearchController@getCountTransport');



};

Route::group(array('domain' => 'api.yboard.com.ua'), $appRoutes);
Route::group(array('domain' => '10.0.0.137'), $appRoutes);
Route::group(array('domain' => '127.0.0.1'), $appRoutes);
Route::group(array('domain' => 'yboard.loc'), $appRoutes);

