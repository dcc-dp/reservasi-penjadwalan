<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
     protected $fillable = [
        'id_kursus',
        'id_user',
        'ulasan',
    ];
}
