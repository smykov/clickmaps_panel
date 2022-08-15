<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HomeController;

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

Route::get('/sites', [SiteController::class, 'index']);
Route::post('/site', [SiteController::class, 'store']);
Route::delete('/site/{site}', [SiteController::class, 'destroy']);
Route::get('/site/{site}', [SiteController::class, 'view']);
Route::get('/site/{site}/chart', [SiteController::class, 'chart']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
