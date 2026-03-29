<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
        'kursus_id',
        'jenis',
        'harga'
    ];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class,'kursus_id');
    }

    public function materis()
    {
        return $this->hasMany(Materi::class,'paket_id');
    }

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class,'id_paket');
    }
}