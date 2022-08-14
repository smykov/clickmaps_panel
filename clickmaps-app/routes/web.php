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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sites', 'SiteController@index');
Route::post('/site', 'SiteController@store');
Route::delete('/site/{site}', 'SiteController@destroy');

Route::get('/clickmaps', 'ClickmapController@index');
Route::post('/clickmap', 'ClickmapController@store');
Route::delete('/clickmap/{clickmap}', 'ClickmapController@destroy');
