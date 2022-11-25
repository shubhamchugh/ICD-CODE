<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CheckAvailableRelease;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ICD11\BlockPageController;
use App\Http\Controllers\Frontend\ICD11\ChapterPageController;
use App\Http\Controllers\Frontend\ICD11\PostPageController;
use App\Http\Controllers\Frontend\ICD11\ReleasePageController;
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



// With the localize middleware, this route cannot be reached without language subdomain
Route::group([ 'middleware' => [ 'speaks-tongue' ]], function() {
	Route::get('/',[HomePageController::class,'index'])->name('home.index');
	Route::get('release/{release}',[ReleasePageController::class,'index'])->name('release.index');
	Route::get('release/{release}/chapter/{parent_id}',[ChapterPageController::class,'index'])->name('chapter.index');
	Route::get('{release}/block/{chapter_code}',[BlockPageController::class,'index'])->name('block.index');
});

Route::get('check_release',[CheckAvailableReleaseController::class,'CheckRelease']);
Route::get('check_book',[BookCheckController::class,'CheckBook']);
Route::get('check_records',[RecordCheckController::class,'RecordCheck']);
Route::get('store_info',[InfoStoreController::class,'InfoStore']);