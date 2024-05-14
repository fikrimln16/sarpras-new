<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $table = 'ruangan';

    public function getDataRuangan()
    {
        return DB::table($this->table)->get();
    }

    public function bangunan()
    {
        return $this->belongsTo(Bangunan::class, 'id_bangunan', 'id');
    }

    public function penempatanSarana()
    {
        return $this->hasMany(PenempatanSarana::class, 'id_ruang');
    }
    
}