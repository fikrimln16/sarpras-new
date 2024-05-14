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
        'lintang',
        'bujur',
        'bmn_satker',
        'bmn_kode_barang',
        'bmn_nup',
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