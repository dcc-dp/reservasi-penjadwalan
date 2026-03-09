<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'reservasi_id',
        'tanggal',
        'hari',
        'jam',
        'ruangan',
        'pertemuan',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class,'reservasi_id');
    }
}