<?php

use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ICD10\ICD10CodePageController;
use App\Http\Controllers\Frontend\ICD11\Icd11CodePageController;
use App\Http\Controllers\GetData\ICD10\Icd10BookStoreController;
use App\Http\Controllers\GetData\ICD10\ICD10InfoStoreController;
use App\Http\Controllers\GetData\ICD10\ICD10RecordStoreController;
use App\Http\Controllers\GetData\ICD10\Icd10StoreAvailableReleaseController;
use App\Http\Controllers\GetData\ICD11\Icd11BookStoreController;
use App\Http\Controllers\GetData\ICD11\Icd11InfoStoreController;
use App\Http\Controllers\GetData\ICD11\Icd11RecordStoreController;
use App\Http\Controllers\GetData\ICD11\Icd11StoreAvailableReleaseController;
use Illuminate\Support\Facades\Route;
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

/******************************
 * ICD 11 DATA STORE FROM API *
 ******************************/
Route::get('icd_11_store_release',[Icd11StoreAvailableReleaseController::class,'StoreRelease']);
Route::get('icd_11_store_book',[Icd11BookStoreController::class,'StoreBook']);
Route::get('icd_11_store_record',[Icd11RecordStoreController::class,'RecordStore']);
Route::get('icd_11_store_info',[Icd11InfoStoreController::class,'InfoStore']);

/******************************
 * ICD 10 DATA STORE FORM API *
******************************/
Route::get('icd_10_store_release',[Icd10StoreAvailableReleaseController::class,'StoreRelease']);
Route::get('icd_10_store_book',[Icd10BookStoreController::class,'StoreBook']);
Route::get('icd_10_store_record',[ICD10RecordStoreController::class,'RecordStore']);
Route::get('icd_10_store_info',[ICD10InfoStoreController::class,'InfoStore']);



Route::group([
	'domain' => request()->server('SERVER_NAME'),
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeCookieRedirect','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	], function() {
	Route::get('/',[HomePageController::class,'index'])->name('home.index');
});

Route::domain('{releaseId}.'.request()->server('SERVER_NAME'))->group(function () {
	Route::get('icd10/{code?}',[ICD10CodePageController::class,'index'])->name('icd10.code.index');
});

// With the localize middleware, this route cannot be reached without language subdomain
Route::group([
	'domain' => '{releaseId}.'.request()->server('SERVER_NAME'),
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeCookieRedirect','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	], function() {
		Route::get('/',[HomePageController::class,'index']);
	Route::get('icd11/{liner_id?}',[Icd11CodePageController::class,'index'])->name('icd11.code.index');
});


