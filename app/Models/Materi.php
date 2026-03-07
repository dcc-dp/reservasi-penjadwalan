<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
     protected $fillable = [
            'paket_id',
            'judul',
            'deskripsi',
        ];

        public function pakets()
        {
            return $this->belongsTo(Paket::class,'paket_id');
        }


}
