<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $fillable = [
        'nama',
        'id_instruktur',
        'id_paket',
        'deskripsi',
    ];
}
