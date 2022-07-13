<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\TruckController;
use App\Models\LaporanPenjualan;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	//resource
	Route::resource('karyawan', KaryawanController::class);
	Route::resource('customer', CustomerController::class);
	Route::resource('driver', DriverController::class);
	Route::resource('truck', TruckController::class);
	Route::resource('laporan', LaporanPenjualanController::class);
	Route::resource('orderreal', 'App\Http\Controllers\OrderRealController');
	Route::resource('delivery', 'App\Http\Controllers\DeliveryController');
	Route::resource('purchase', 'App\Http\Controllers\PurchaseOrderController');
	Route::resource('control', 'App\Http\Controllers\ControlDeliveryController');
	Route::resource('suratjalan', 'App\Http\Controllers\SuratJalanController');
	Route::resource('distribusi', 'App\Http\Controllers\PendistribusianController');
	Route::resource('tandaterima', 'App\Http\Controllers\TandaTerimaController');

});

