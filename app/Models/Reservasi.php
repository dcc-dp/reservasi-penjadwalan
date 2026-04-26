<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'id_user',
        'id_kursus',
        'id_paket',
        'ruangan',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}