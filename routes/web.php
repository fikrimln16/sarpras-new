<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sdid\Sarpras\SarprasBackend\SarprasManajemenAset;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthenticateUser;

// Route::get('manajemen_aset/prasarana', [SarprasManajemenAset::class, 'index_prasarana'])
//      ->name('manajemen_aset.prasarana');
Route::get('manajemen_aset/prasarana', [SarprasManajemenAset::class, 'index_prasarana'])
     ->name('manajemen_aset.prasarana')
     ->middleware(AuthenticateUser::class);
Route::post('manajemen_aset/prasarana', [SarprasManajemenAset::class, 'create_prasarana'])
     ->name('manajemen_aset.prasarana.create');
Route::get('manajemen_aset/prasarana/{id}', [SarprasManajemenAset::class, 'get_data_prasarana'])
     ->name('manajemen_aset.prasarana.getData');
Route::delete('manajemen_aset/prasarana/delete/{id}', [SarprasManajemenAset::class, 'delete_prasarana'])
     ->name('manajemen_aset.prasarana.delete');

Route::get('manajemen_aset/ruangan', [SarprasManajemenAset::class, 'index_ruangan'])
     ->name('manajemen_aset.ruangan');
Route::get('manajemen_aset/ruangan/{id}', [SarprasManajemenAset::class, 'get_data_ruangan'])
     ->name('manajemen_aset.ruangan.getData');
Route::get('manajemen_aset/ruangan/bangunan/{id_bangunan}', [SarprasManajemenAset::class, 'get_data_ruangan_by_bangunan'])
     ->name('manajemen_aset.ruangan.getDataByBangunan');
Route::post('manajemen_aset/ruangan', [SarprasManajemenAset::class, 'create_ruangan'])
     ->name('manajemen_aset.ruangan.create');
Route::delete('manajemen_aset/ruangan/delete/{id}', [SarprasManajemenAset::class, 'delete_ruangan'])
     ->name('manajemen_aset.ruangan.delete');

Route::get('manajemen_aset/penempatansarana/{id_ruangan}', [SarprasManajemenAset::class, 'penempatan_sarana'])
     ->name('manajemen_aset.penempatansarana');
Route::post('manajemen_aset/sarana', [SarprasManajemenAset::class, 'tambah_sarana'])
     ->name('manajemen_aset.sarana.create');
Route::get('manajemen_aset/sarana', [SarprasManajemenAset::class, 'index_sarana']);




Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');


// Route::group(['middleware' => 'auth'], function () {
//      Route::get('/manajamen_aset/prasarana', [AuthController::class, 'index']);
//      Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
//      });