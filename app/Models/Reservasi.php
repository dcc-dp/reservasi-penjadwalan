<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = [
        'id_user',
        'id_kursus',
        'hari1',
        'hari2',
        'jam2',
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
