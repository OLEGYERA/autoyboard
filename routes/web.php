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



Route::get('/parseLinks', 'Aggregator\Parse@runParseLinks');
Route::get('/parseCards', 'Aggregator\Parse@runParseCards');
//Route::get('/cardTest/{id}', 'Site\Auto\SearchController@cardTest');

Route::get('/filterparse', 'Controller@filterparse')->name('filterparse');
Route::get('/test-ftp', 'Controller@testFTP')->name('filterparse');

Route::get('/parseExchange', 'System\ExchangeRatesController@parseRate');
//Route::get('/launch', 'AGGREGATOR\Services\autoria\LaunchController@parse');
//Route::get('/aggregator', 'AGGREGATOR\Kernel\Core@startProcedure');
//Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();
//->name('m.ru.')->namespace('OLEGYERA\FrontBox')->namespace('OLEGYERA\FrontBox')

Route::get('/', 'Site\Auto\PageController@startru');

Route::get('/filter', 'Site\Auto\PageController@filterru')->name('filter.ru');
Route::get('/filter', 'Site\Auto\PageController@filterua')->name('filter.ua');

Route::get('/card/{id}', 'Site\Auto\PageController@cardru')->name('card.ru');
//Route::get('/card/{id}', 'Site\Auto\PageController@cardua')->name('card.ua');

Route::get('/favorite', 'Site\Auto\PageController@favoriteru')->name('favorite.ru');
Route::get('/favorite', 'Site\Auto\PageController@favoriteua')->name('favorite.ua');

Route::get('/extended', 'Site\Auto\PageController@extended')->name('extended');

Route::get('/presentation', 'Site\Auto\PageController@presentationru')->name('presentation.ru');
Route::get('/presentation', 'Site\Auto\PageController@presentationua')->name('presentation.ua');

Route::get('/faq', 'Site\Auto\PageController@faqru')->name('faq.ru');
Route::get('/faq', 'Site\Auto\PageController@faqua')->name('faq.ua');

Route::get('/about', 'Site\Auto\PageController@aboutru')->name('about.ru');
Route::get('/about', 'Site\Auto\PageController@aboutua')->name('about.ua');

Route::get('/convention', 'Site\Auto\PageController@conventionru')->name('convention.ru');
Route::get('/convention', 'Site\Auto\PageController@conventionua')->name('convention.ua');

Route::get('/confidentiality', 'Site\Auto\PageController@confidentialityru')->name('confidentiality.ru');
Route::get('/confidentiality', 'Site\Auto\PageController@confidentialityua')->name('confidentiality.ua');

Route::get('/marks', 'Site\Auto\PageController@marksru')->name('marks.ru');
Route::get('/marks', 'Site\Auto\PageController@marksua')->name('marks.ua');

Route::get('/catbody', 'Site\Auto\PageController@catbodyru')->name('catbody.ru');
Route::get('/catbody', 'Site\Auto\PageController@catbodyua')->name('catbody.ua');

Route::get('/changelog', 'Site\Auto\PageController@changelogru')->name('changelog.ru');
Route::get('/changelog', 'Site\Auto\PageController@changelogua')->name('changelog.ua');

Route::get('/update', 'Site\Auto\PageController@updateru')->name('update.ru');
Route::get('/update', 'Site\Auto\PageController@updateua')->name('update.ua');


Route::get('/404', 'Site\Auto\PageController@status404ru')->name('404.ru');
Route::get('/404', 'Site\Auto\PageController@status404ua')->name('404.ua');

Route::get('/500', 'Site\Auto\PageController@status500ru')->name('500.ru');
Route::get('/500', 'Site\Auto\PageController@status500ua')->name('500.ua');

Route::get('/503', 'Site\Auto\PageController@status503ru')->name('503.ru');
Route::get('/503', 'Site\Auto\PageController@status503ua')->name('503.ua');


Route::get('/auto/{card_id}/{num}.jpg', 'System\ImageConnector@getImage')->name('getImage');




//->name('m.ru.')->namespace('OLEGYERA\FrontBox')->namespace('OLEGYERA\FrontBox')
