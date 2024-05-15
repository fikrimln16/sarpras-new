<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenempatanPrasarana extends Model
{
    use HasFactory;

    protected $table = 'penempatan_prasarana';

    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function getData()
    {
        return DB::table($this->table)->get();
    }

    public function prasarana()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana');
    }

    public function data_lokasi_kampus()
    {
        return $this->belongsTo(DataLokasiKampus::class, 'id_data_lokasi_kampus');
    }
}