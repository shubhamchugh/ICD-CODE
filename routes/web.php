<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ICD11\CodePageController;
use App\Http\Controllers\Frontend\ICD11\ReleasePageController;
use App\Http\Controllers\GetData\ICD11\BookCheckController;
use App\Http\Controllers\GetData\ICD11\CheckAvailableReleaseController;
use App\Http\Controllers\GetData\ICD11\InfoStoreController;
use App\Http\Controllers\GetData\ICD11\RecordCheckController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('check_release',[CheckAvailableReleaseController::class,'CheckRelease']);
Route::get('check_book',[BookCheckController::class,'CheckBook']);
Route::get('check_records',[RecordCheckController::class,'RecordCheck']);
Route::get('store_info',[InfoStoreController::class,'InfoStore']);


// With the localize middleware, this route cannot be reached without language subdomain
Route::group([ 'middleware' => [ 'speaks-tongue' ]], function() {
	Route::get('/',[HomePageController::class,'index'])->name('home.index');
	Route::get('release/{release}',[ReleasePageController::class,'index'])->name('release.index');
	Route::get('{releaseId}/{liner_id?}',[CodePageController::class,'index'])->name('code.index');
});