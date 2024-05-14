<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sdid\Sarpras\SarprasBackend\SarprasManajemenAset;

Route::get('manajemen_aset/prasarana', [SarprasManajemenAset::class, 'index_prasarana'])
     ->name('manajemen_aset.prasarana');
Route::post('manajemen_aset/prasarana', [SarprasManajemenAset::class, 'create_prasarana'])
     ->name('manajemen_aset.prasarana.create');

Route::get('manajemen_aset/ruangan', [SarprasManajemenAset::class, 'create_prasarana'])
     ->name('manajemen_aset.ruangan');
Route::get('manajemen_aset/penempatansarana/{id_ruangan}', [SarprasManajemenAset::class, 'penempatan_sarana'])
     ->name('manajemen_aset.penempatansarana');

Route::get('manajemen_aset/sarana', [SarprasManajemenAset::class, 'index_sarana']);
