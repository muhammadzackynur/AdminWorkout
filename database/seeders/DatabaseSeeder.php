<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Baris ini akan membuat satu pengguna spesifik
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password') // Ganti dengan password yang aman
        ]);

        // Anda juga bisa membuat 10 pengguna acak menggunakan factory
        // User::factory(10)->create();
    }
}