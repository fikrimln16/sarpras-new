<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenempatanSarana extends Model
{
    use HasFactory;

    protected $table = 'penempatan_sarana';

    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function getData()
    {
        return DB::table($this->table)->get();
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }

    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'id_sarana');
    }
}