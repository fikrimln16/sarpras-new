<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenempatanUsersUniv extends Model
{
    use HasFactory;

    protected $table = 'penempatan_users_univ';

    public $timestamps = false; 
    public $incrementing = true;
    
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function data_lokasi_kampus()
    {
        return $this->belongsTo(DataLokasiKampus::class, 'id_data_lokasi_kampus');
    }
}