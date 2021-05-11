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

Route::prefix('merchant')->group(function() {
    Route::get('ajax', 'MerchantController@ajax')->name('merchant.ajax');
});
Route::resource('merchant', 'MerchantController');
