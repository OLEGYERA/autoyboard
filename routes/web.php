<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'Site\Auto\PageController@start');
Route::get('/img/{alias}', 'Auto\PageController@generateURL')->name('lol');

Route::get('/launch', 'AGGREGATOR\Services\autoria\LaunchController@parse');


Route::get('first_try', 'Controller@first_try');

Route::get('/aggregator', 'AGGREGATOR\Kernel\Core@startProcedure');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


