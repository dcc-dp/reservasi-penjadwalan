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

    public function instruktur()
    {
        return $this->belongsTo(Instruktur_Profile::class, 'id_instruktur');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

}
