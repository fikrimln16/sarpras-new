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

    public function prasarana()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana', 'id');
    }

    public function penempatan_users_univ()
    {
        return $this->hasMany(Prasarana::class, 'id_data_lokasi_kampus', 'id');
    }
}