<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@softui.com',
                'password' => Hash::make('secret'),
                'role' => 'admin',
                'notelp' => '081234567890',
                'jk' => 'L',
                'alamat' => 'Kantor Pusat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Instruktur',
                'email' => 'instruktur@softui.com',
                'password' => Hash::make('secret'),
                'role' => 'instruktur',
                'notelp' => '082345678901',
                'jk' => 'L',
                'alamat' => 'Jl. Pendidikan No. 10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siswa',
                'email' => 'siswa@softui.com',
                'password' => Hash::make('secret'),
                'role' => 'siswa',
                'notelp' => '083456789012',
                'jk' => 'P',
                'alamat' => 'Jl. Belajar No. 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
