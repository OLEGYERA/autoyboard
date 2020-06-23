<?php

use Illuminate\Support\Facades\Route;

Route::name('api.auth')->prefix('/yb-v1/api/auth')->namespace('Auth')->group(function () {
    Route::post('/verify', 'RuleController@verify')->name('verify');
});


