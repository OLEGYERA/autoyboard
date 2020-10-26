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

    Route::get('/manufacture_countries', 'API\FilterController@GET_manufacture_countries');

    Route::get('/regions', 'API\RegionController@GET_region');


    Route::post('/validateSearch', 'API\UriValidatorController@validateSearch');

//    manufatureID=4

//    Route::post('/inverse_form', 'API\RegionController@POST_inverse_form');

};

Route::group(array('domain' => 'api.yboard'), $appRoutes);
Route::group(array('domain' => '10.0.0.137'), $appRoutes);
Route::group(array('domain' => 'yboard.loc'), $appRoutes);

