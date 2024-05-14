<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sdid\Sarpras\SarprasBackend\SarprasManajemenAset;

Route::get('manajemen_aset/bangunan', [SarprasManajemenAset::class, 'index_bangunan'])
     ->name('manajemen_aset.bangunan');
     
Route::get('manajemen_aset/ruangan', [SarprasManajemenAset::class, 'index_ruangan'])
     ->name('manajemen_aset.ruangan');
Route::get('manajemen_aset/penempatansarana/{id_ruangan}', [SarprasManajemenAset::class, 'penempatan_sarana'])
     ->name('manajemen_aset.penempatansarana');

Route::get('manajemen_aset/sarana', [SarprasManajemenAset::class, 'index_sarana']);