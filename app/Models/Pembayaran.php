<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'reservasi_id',
        'metode_bayar',
        'total',
        'status',
    ];
}
