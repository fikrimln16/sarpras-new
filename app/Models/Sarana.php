<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ruangan;

class Sarana extends Model
{
    use HasFactory;

    protected $table = 'sarana';

    public function getDataSarana()
    {
        return DB::table($this->table)->get();
    }

    public function penempatanSarana()
    {
        return $this->hasMany(PenempatanSarana::class, 'id_sarana');
    }

    public function getDataSaranaByIdRuang($id_ruangan)
    {
      return Ruangan::with('penempatanSarana.sarana')->find($id_ruangan);
    }
}