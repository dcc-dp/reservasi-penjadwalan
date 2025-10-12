<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'id_user',
        'id_kursus',
        'tanggal',
        'hari',
        'jam',
        'ruangan',
        'pertemuan',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus');
    }
}
