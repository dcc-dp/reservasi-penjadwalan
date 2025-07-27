<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'id_user',
        'id_kursus',
        'hari1',
        'hari2',
        'jam2',
    ];
}
