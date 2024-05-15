<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberPendanaan extends Model
{
    use HasFactory;

    protected $table = 'sumber_pendanaan';

    public function getSumberPendanaan()
    {
        return DB::table($this->table)->get();
    }

    public function prasarana()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana');
    }
}