<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;

    protected $table = 'bangunan';

    public function getDataBangunan()
    {
        return DB::table($this->table)->get();
    }

    public function ruangan()
    {
        return $this->hasMany(Ruangan::class, 'id_bangunan', 'id');
    }
}