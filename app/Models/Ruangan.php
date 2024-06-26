<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    public $timestamps = false; 
    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function getDataRuangan()
    {
        return DB::table($this->table)->get();
    }

    public function bangunan()
    {
        return $this->belongsTo(Bangunan::class, 'id_bangunan', 'id');
    }

    // public function prasarana()
    // {
    //     return $this->belongsTo(Prasarana::class, 'id_prasarana', 'id');
    // }

    public function penempatanSarana()
    {
        return $this->hasMany(PenempatanSarana::class, 'id_ruang');
    }
    
}