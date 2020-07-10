<?php

use Illuminate\Support\Facades\Route;

Route::name('api.admin.')->prefix('/yb-v1/api/admin')->namespace('Admin')->group(function () {
    Route::get('/auth-user', 'AuthUserController@receiveData')->name('verify');

    Route::name('aggregator.')->prefix('aggregator')->namespace('Aggregator')->group(function () {
        Route::name('nucleus.')->prefix('nucleus')->namespace('Nucleus')->group(function () {
            Route::get('/proxy/all', 'ProxyController@receiveAll')->name('all');
        });
    });
});
//

Route::get('admin/{route?}', 'Admin\BasicController@startAdmin')->where('route', '.*')->name('web.admin');

//
//Route::name('web.ad.')->prefix('/authentication')->namespace('Auth')->group(function () {
//    Route::get('/', function() {
//        return view('Auth');
//    })->name('main');
//    Route::get('/email/ver/{token}', 'VerificationController@emailVerification')->name('email.verification');
//    Route::get('/google', 'GoogleController@redirect');
//    Route::get('/callback', 'GoogleController@callback');
//    Route::get('/facebook', 'FacebookController@redirect');
//    Route::get('/fb/callback', 'FacebookController@callback');
//
//});


