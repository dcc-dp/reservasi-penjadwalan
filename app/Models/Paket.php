<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $fillable = [
      'id_materi',
      'jenis',
      'harga',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class, 'id_materi', 'id');
    }
}
