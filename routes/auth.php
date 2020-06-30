<?php

use Illuminate\Support\Facades\Route;

Route::name('api.auth')->prefix('/yb-v1/api/auth')->namespace('Auth')->group(function () {
    Route::post('/verify', 'RuleController@verify')->name('verify');
    Route::post('/signup', 'RegisterController@signup')->name('signup');
    Route::get('/token', 'RegisterController@prepareToken')->name('email');
});

Route::name('web.auth.')->prefix('/authentication')->namespace('Auth')->group(function () {
    Route::get('/', function() {
        return view('auto.site.Auth');
    });
    Route::get('/email/ver/{token}', 'VerificationController@emailVerification')->name('email.verification');

});


