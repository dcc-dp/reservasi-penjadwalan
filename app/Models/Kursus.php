<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $fillable = [
        'name',
        'id_instruktur',
        'id_paket',
        'deskripsi',
    ];
    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
