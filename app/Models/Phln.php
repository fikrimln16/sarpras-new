<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phln extends Model
{
    use HasFactory;

    protected $table = 'phln';

    public $incrementing = true;

    protected $guarded = ['id'];

   //  public function ruangan()
   //  {
   //      return $this->hasMany(Ruangan::class, 'id_bangunan', 'id');
   //  }
}