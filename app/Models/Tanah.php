<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    use HasFactory;

    protected $table = 'tanah';

    public $incrementing = true;

    protected $guarded = ['id'];

    public function prasarana()
    {
        return $this->belongsTo(Prasarana::class, 'id_prasarana');
    }
   //  public function bangunan()
   //  {
   //      return $this->hasMany(Prasarana::class, 'id_prasarana');
   //  }
}