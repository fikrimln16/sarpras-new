<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLokasiKampus extends Model
{
    use HasFactory;

    protected $table = 'data_lokasi_kampus';

    public function getDataLokasiKampus()
    {
        return DB::table($this->table)->get();
    }

    public function ruangan()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana', 'id');
    }
}