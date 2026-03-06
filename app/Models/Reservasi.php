<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'id_user',
        'id_kursus',
        'hari',
        'jam',
    ];

    // relasi ke user (siswa)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // relasi ke kursus
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }

    // relasi ke pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'reservasi_id');
    }
}