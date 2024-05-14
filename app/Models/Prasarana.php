<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prasarana extends Model
{
    use HasFactory;

    protected $table = 'prasarana';
    public $timestamps = false; 
    public $incrementing = true;
    
    protected $fillable = [
        'nama_prasarana',
        'panjang',
        'lebar',
        'luas_bangunan',
        'alamat',
        'latitude',
        'longitude',
        'BMN_satker',
        'BMN_kode_barang',
        'BMN_nup',
        'tanggal_perolehan',
        'nilai_perolehan',
        'nilai_buku',
        'merk'
    ];
    

    public function getDataPrasarana()
    {
        return DB::table($this->table)->get();
    }
}