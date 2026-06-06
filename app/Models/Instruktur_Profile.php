<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruktur_Profile extends Model
{
    protected $table = 'instruktur__profiles';

    protected $fillable = [
        'user_id',
        'keahlian',
        'pengalaman',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kursus()
    {
        return $this->hasMany(Kursus::class, 'id_instruktur', 'id');
    }
}
