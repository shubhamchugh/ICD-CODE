<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CheckAvailableRelease;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\ICD11\BookCheckController;
use App\Http\Controllers\ICD11\CheckAvailableReleaseController;
use App\Http\Controllers\ICD11\ICD11RecordsController;
use App\Http\Controllers\ICD11\InfoStoreController;
use App\Http\Controllers\ICD11\RecordCheckController;
use App\Http\Controllers\IcdRecordsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomePageController::class,'home']);



Route::get('check_release',[CheckAvailableReleaseController::class,'CheckRelease']);
Route::get('check_book',[BookCheckController::class,'CheckBook']);
Route::get('check_records',[RecordCheckController::class,'RecordCheck']);
Route::get('store_info',[InfoStoreController::class,'InfoStore']);