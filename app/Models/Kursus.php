<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    protected $fillable = [
        'name',
        'id_instruktur',
        'deskripsi'
    ];

    public function instruktur()
    {
        return $this->belongsTo(User::class,'id_instruktur');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class,'paket_id');
    }

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class,'id_kursus');
    }
}