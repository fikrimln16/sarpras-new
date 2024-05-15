<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sdid\Sarpras\SarprasBackend\SarprasManajemenAset;

Route::get('manajemen_aset/prasarana', [SarprasManajemenAset::class, 'index_prasarana'])
     ->name('manajemen_aset.prasarana');
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

Route::get('manajemen_aset/sarana', [SarprasManajemenAset::class, 'index_sarana']);