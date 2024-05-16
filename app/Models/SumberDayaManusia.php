<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDayaManusia extends Model
{
    use HasFactory;

    protected $table = 'sumber_daya_manusia';

    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function getDataBangunan()
    {
        return DB::table($this->table)->get();
    }

    public function penempatan_sdm_ruang()
    {
        return $this->hasMany(PenempatanSdmRuang::class, 'id_bangunan', 'id');
    }
}