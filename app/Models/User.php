<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
      protected $fillable = [
          'name',
          'email',
          'password',
          'role',
          'notelp',
          'jk',
          'alamat'
      ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 🔑 Helper untuk role
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isInstruktur(): bool
    {
        return $this->role === 'instruktur';
    }

    public function isSiswa(): bool
    {
        return $this->role === 'siswa';
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id_user');
    }

}
