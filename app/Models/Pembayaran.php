<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'reservasi_id',
        'order_id',
        'snap_token',
        'transaction_id',
        'metode_bayar',
        'payment_type',
        'total',
        'status',
        'paid_at'
    ];

    // relasi ke reservasi
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}