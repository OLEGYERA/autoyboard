<?php

use Illuminate\Support\Facades\Route;

Route::get('full-filter', 'Site\Auto\FiltersPage@getFullFilterRu')->name('full-filter.ru');
Route::get('filter', 'Site\Auto\FiltersPage@getFilterRu')->name('filter.ru');
