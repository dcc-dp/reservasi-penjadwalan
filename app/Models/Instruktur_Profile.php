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
}
