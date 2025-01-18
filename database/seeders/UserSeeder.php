<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan pengguna masyarakat
        User::create([
            'name' => 'Masyarakat User',
            'email' => 'masyarakat@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'role' => 'masyarakat',
        ]);

        // Menambahkan pengguna pimpinan
        User::create([
            'name' => 'Pimpinan User',
            'email' => 'pimpinan@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'role' => 'pimpinan',
        ]);

        // Menambahkan pengguna admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
            'role' => 'admin',
        ]);
    }
}
