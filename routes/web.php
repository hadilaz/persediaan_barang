<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrgmasukController;
use App\Http\Controllers\BrgkeluarController;
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
    return view('auth/loginsb');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/home', HomeController::class);



 //data kategori
 Route::resource('/kategori', KategoriBarangController::class);
 Route::post('/kategori/store', [KategoriBarangController::class, 'store']);
 Route::post('/kategori/{id}/update', [KategoriBarangController::class, 'update']);
//  Route::get('/kategori/{id}/destroy', [KategoriBarangController::class, 'destroy']);


//data barang
Route::resource('/barang', BarangController::class);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/{id}/update', [BarangController::class, 'update']);
Route::get('/exportpdf', [BarangController::class, 'exportpdf'])->name('exportpdf');
// Route::get('/barang/{id}/show', [BarangController::class, 'show']);
// Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy']);

//data barangmasuk
Route::resource('/brgmasuk', BrgmasukController::class);
Route::post('/brgmasuk/store', [BrgmasukController::class, 'store']);
Route::get('/brgmasuk/create', [BrgmasukController::class, 'create']);
Route::get('/exportpdfmasuk', [BrgmasukController::class, 'exportpdf'])->name('exportpdf');

//data barangkeluar
Route::resource('/brgkeluar', BrgkeluarController::class);
Route::post('/brgkeluar/store', [BrgkeluarController::class, 'store']);
Route::get('/brgkeluar/create', [BrgkeluarController::class, 'create']);
Route::get('/exportpdfkeluar', [BrgkeluarController::class, 'exportpdf'])->name('exportpdf');


Route::group(['middleware' => ['role:Admin']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});

// Route::group(['middleware' => ['auth']], function() {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
// });
