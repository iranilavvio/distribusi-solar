<?php

use App\Http\Controllers\ControlDeliveryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KepangkatanController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\OrderRealController;
use App\Http\Controllers\PendistribusianController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\TandaTerimaController;
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
	Route::group(['middleware' => ['role:super admin|admin distribusi|head distribusi']], function () {
		//
	Route::resource('karyawan', KaryawanController::class);
	Route::resource('customer', CustomerController::class);
	Route::resource('driver', DriverController::class);
	Route::resource('truck', TruckController::class);
	Route::resource('laporan', LaporanPenjualanController::class);
	Route::resource('orderreal', 'App\Http\Controllers\OrderRealController');
	Route::resource('delivery', 'App\Http\Controllers\DeliveryController');
	//getDelivery
	Route::get('/getDelivery', [DeliveryController::class, 'getDelivery'])->name('delivery.suratjalan');
	Route::resource('purchase', 'App\Http\Controllers\PurchaseOrderController');
	Route::resource('control', 'App\Http\Controllers\ControlDeliveryController');
	Route::resource('suratjalan', 'App\Http\Controllers\SuratJalanController');
	//cetakSurat
	Route::get('/cetakSurat/{id}', [SuratJalanController::class, 'cetakSurat'])->name('suratjalan.cetak');
	Route::resource('distribusi', 'App\Http\Controllers\PendistribusianController');
	Route::resource('tandaterima', 'App\Http\Controllers\TandaTerimaController');
	//cetakTandaTerima
	Route::get('/cetakTandaTerima/{id}', [TandaTerimaController::class, 'cetakTandaTerima'])->name('tandaterima.cetak');
	//getTandaTerima
	Route::get('/getTandaTerima', [TandaTerimaController::class, 'getTandaTerima'])->name('tandaterima.suratjalan');

	//resource kepangkatan
	Route::resource('kepangkatan', 'App\Http\Controllers\KepangkatanController');
	

	//report PDF
	Route::get('/driverpdf', [DriverController::class, 'createPDF'])->name('driver.pdf');
	Route::get('/orderrealpdf', [OrderRealController::class, 'createPDF'])->name('orderreal.pdf');
	Route::get('/suratjalanpdf', [SuratJalanController::class, 'createPDF'])->name('suratjalan.pdf');
	Route::get('/distribusipdf', [PendistribusianController::class, 'createPDF'])->name('distribusi.pdf');
	Route::get('/deliverypdf', [DeliveryController::class, 'createPDF'])->name('delivery.pdf');
	Route::get('/controlpdf', [ControlDeliveryController::class, 'createPDF'])->name('control.pdf');
	Route::get('/tandaterimapdf', [TandaTerimaController::class, 'createPDF'])->name('tandaterima.pdf');
	Route::get('/purchasepdf', [PurchaseOrderController::class, 'createPDF'])->name('purchase.pdf');
	//pangkatan PDF
	Route::get('/kepangkatanpdf', [KepangkatanController::class, 'createPDF'])->name('kepangkatan.pdf');

});
});

