<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ClickmapController;
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

Route::get('/sites', [SiteController::class,'index']);
Route::post('/site', [SiteController::class,'store']);
Route::delete('/site/{site}', [SiteController::class,'destroy']);

Route::get('/clickmaps', [ClickmapController::class,'index']);
Route::post('/clickmap', [ClickmapController::class,'store']);
Route::delete('/clickmap/{clickmap}', [ClickmapController::class,'destroy']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
