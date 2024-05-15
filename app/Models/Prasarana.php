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
    
    protected $guarded = ['id'];
    
    public function getDataPrasarana()
    {
        return DB::table($this->table)->get();
    }

    public function penempatan_prasarana()
    {
        return $this->hasMany(PenempatanPrasarana::class, 'id_prasarana');
    }

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'id_ruangan');
    }
}