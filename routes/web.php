<?php

use App\Events\PembayaranEvent;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UsersController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('halaman', function () {
//     PembayaranEvent::dispatch("connected");
// });

Route::post('/', [LoginController::class, 'authenticate']);
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');
Route::resource('profil', ProfilController::class)->middleware('auth');
Route::get('/', [LayoutController::class, 'home'])->middleware('auth');
Route::get('/produk', [LayoutController::class, 'index'])->middleware('auth');
Route::resource('pesanan', PesananController::class)->middleware('auth');
// Route::group(['middleware' => ['auth']], function () {
Route::group(['middleware' => ['cekUserLogin:admin']], function () {
    Route::resource('barang', BarangController::class);
    Route::resource('barangMasuk', BarangMasukController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('detail', DetailController::class);
    Route::resource('users', UsersController::class);
    Route::resource('transaksi', TransaksiController::class);
});
Route::group(['middleware' => ['cekUserLogin:user']], function () {
    Route::resource('pesanan', PesananController::class);
    Route::resource('pembayaran', PembayaranController::class);
});
// });