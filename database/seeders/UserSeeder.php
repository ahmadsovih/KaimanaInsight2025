<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'nama' => 'Admin',
            'email' => 'admin@bps.go.id',
            'password' => Hash::make('password123'), // mengenkripsi password
            'isAccepted' => 1, // 1 berarti diterima
            'isAdmin' => 1, // 1 berarti admin
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        // Menambahkan data lebih banyak jika diperlukan
        DB::table('user')->insert([
            'nama' => 'Admin2',
            'email' => 'admin2@bps.go.id',
            'password' => Hash::make('password123'),
            'isAccepted' => 0, // 0 berarti belum diterima
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
