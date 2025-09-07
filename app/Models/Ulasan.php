<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = [
    'id_kursus',
    'id_user',
    'ulasan',
    'rating', 
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }
}
