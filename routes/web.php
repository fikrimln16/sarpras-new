<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sdid\Sarpras\SarprasBackend\SarprasManajemenAset;
use App\Http\Controllers\Sdid\Sarpras\SarprasBackend\SarprasSumberDana;
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
Route::get('manajemen_aset/sarana', [SarprasManajemenAset::class, 'index_sarana'])
     ->name('manajemen_aset.sarana');
Route::delete('manajemen_aset/sarana/delete/{id_ruang}/{id}', [SarprasManajemenAset::class, 'delete_sarana'])
     ->name('manajemen_aset.sarana.delete');
Route::get('manajemen_aset/sarana/{id}', [SarprasManajemenAset::class, 'get_data_ruangan'])
     ->name('manajemen_aset.sarana.getData');
Route::put('/manajemen_aset/sarana', [SarprasManajemenAset::class, 'update_sarana'])
     ->name('manajemen_aset.sarana.update');
Route::post('/manajemen_aset/sarana/import', [SarprasManajemenAset::class, 'tambah_sarana_import'])
     ->name('manajemen_aset.sarana.import');



Route::get('manajemen_aset/ruang_dosen', [SarprasManajemenAset::class, 'index_inventaris'])
     ->name('manajemen_aset.inventaris');
Route::get('manajemen_aset/inventaris/{id_bangunan}', [SarprasManajemenAset::class, 'getRuangan'])
     ->name('manajemen_aset.inventaris.getRuangan');
Route::post('manajemen_aset/inventaris', [SarprasManajemenAset::class, 'tambah_pemetaan_dosen'])
     ->name('manajemen_aset.inventaris.tambah_pemetaan_dosen');
Route::get('manajemen_aset/inventaris/serverside/ruang_sdm', [SarprasManajemenAset::class, 'get_data_inventaris_ruang_sdm'])
     ->name('manajemen_aset.inventaris.getDataRuangSdm');
Route::delete('manajemen_aset/inventaris/delete/{id_ruang}/{id}', [SarprasManajemenAset::class, 'hapus_pemetaan_dosen'])
     ->name('manajemen_aset.inventaris.delete');

Route::get('manajemen_aset/ruang_sarana', [SarprasManajemenAset::class, 'index_inventaris_ruang_sarana'])
     ->name('manajemen.aset.inventaris.index_ruang_sarana');
Route::get('manajemen_aset/inventaris/serverside/ruang_sarana', [SarprasManajemenAset::class, 'get_data_inventaris_ruang_sarana'])
     ->name('manajemen_aset.inventaris.getDataRuangSarana');


// Route::get('manajemen_aset/inventaris/detailed/ruang_sdm', [SarprasManajemenAset::class, 'get_detail_inventaris_ruang_sdm'])
//      ->name('manajemen_aset.inventaris.getDetailRuangSdm');


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

Route::get('perolehan_aset/pendanaan', [SarprasSumberDana::class, 'index_pendanaan'])
     ->name('perolehan_aset.pendanaan');

Route::get('perolehan_aset/pendanaan/sbsn', [SarprasSumberDana::class, 'index_pendanaan_sbsn'])
     ->name('perolehan_aset.pendanaan.sbsn');

Route::get('perolehan_aset/pendanaan/phln', [SarprasSumberDana::class, 'index_pendanaan_phln'])
     ->name('perolehan_aset.pendanaan.phln');

Route::get('perolehan_aset/data_paket', [SarprasSumberDana::class, 'index_data_paket'])
     ->name('perolehan_aset.data_paket');

Route::get('perolehan_aset/data_realisasi', [SarprasSumberDana::class, 'index_data_realisasi'])
     ->name('perolehan_aset.data_realisasi');

// POST routes
Route::post('perolehan_aset/createSBSN', [SarprasSumberDana::class, 'insert_sbsn'])
     ->name('perolehan_aset.tambah_sbsn');

Route::post('perolehan_aset/createPHLN', [SarprasSumberDana::class, 'insert_phln'])
     ->name('perolehan_aset.tambah_phln');