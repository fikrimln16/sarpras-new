<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SumberPendanaan extends Model
{
    use HasFactory;

    protected $table = 'sumber_pendanaan';

    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function getSumberPendanaan()
    {
        return DB::table($this->table)->get();
    }

    public function prasarana()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana');
    }
}