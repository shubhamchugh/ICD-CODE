<?php

use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ICD11\Icd11ChapterPageController;
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

// With the localize middleware, this route cannot be reached without language subdomain
Route::group([ 'middleware' => [ 'speaks-tongue' ]], function() {
	Route::get('/',[HomePageController::class,'index'])->name('home.index');
	Route::get('release/{release}',[Icd11ChapterPageController::class,'index'])->name('release.index');
	Route::get('{releaseId}/{liner_id?}',[Icd11CodePageController::class,'index'])->name('code.index');
});