<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenempatanSdmRuang extends Model
{
    use HasFactory;

    protected $table = 'penempatan_sdm_ruang';

    public $timestamps = false; 
    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function ruang()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruang');
    }

    public function sumber_daya_manusia()
    {
        return $this->belongsTo(SumberDayaManusia::class, 'id_sdm');
    }
}