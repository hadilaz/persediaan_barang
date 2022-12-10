<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrgmasukController;
use App\Http\Controllers\KategoriBarangController;

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



 //data kategori
 Route::resource('/kategori', KategoriBarangController::class);
 Route::post('/kategori/store', [KategoriBarangController::class, 'store']);
 Route::post('/kategori/{id}/update', [KategoriBarangController::class, 'update']);
//  Route::get('/kategori/{id}/destroy', [KategoriBarangController::class, 'destroy']);


//data barang
Route::resource('/barang', BarangController::class);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/{id}/update', [BarangController::class, 'update']);
// Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);

//data barangmasuk
Route::resource('/brgmasuk', BrgmasukController::class);
Route::post('/brgmasuk/store', [BrgmasukController::class, 'store']);
Route::get('/brgmasuk/ajax', [BrgmasukController::class, 'ajax']);
Route::get('/brgmasuk/create', [BrgmasukController::class, 'create']);

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
