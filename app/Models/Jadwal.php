<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'id_user',
        'id_kursus',
        'tanggal',
        'hari',
        'jam',
        'ruangan',
        'pertemuan',
    ];

}
