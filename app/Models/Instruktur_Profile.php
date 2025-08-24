<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instruktur_Profile extends Model
{
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
}
