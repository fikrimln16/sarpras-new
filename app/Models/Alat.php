<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';

    public $incrementing = true;

    protected $guarded = ['id'];


   //  public function ruangan()
   //  {
   //      return $this->hasMany(Ruangan::class, 'id_bangunan', 'id');
   //  }

   //  public function prasarana()
   //  {
   //      return $this->belongsTo(Prasarana::class, 'id_prasarana');
   //  }
}