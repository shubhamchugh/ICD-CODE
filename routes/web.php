<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CheckAvailableRelease;
use App\Http\Controllers\ICD11\CheckAvailableReleaseController;
use App\Http\Controllers\ICD11\ICD11RecordsController;
use App\Http\Controllers\IcdRecordsController;

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


Route::get('/',[TestController::class,'test']);
Route::get('/check_release',[CheckAvailableReleaseController::class,'check_release']);
Route::get('/check_records',[ICD11RecordsController::class,'check_records']);