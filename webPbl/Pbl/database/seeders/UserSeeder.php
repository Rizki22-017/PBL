<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin', // Tambahkan kolom role dengan nilai 'admin' untuk admin
        ]);

        // Insert regular user
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user', // Tambahkan kolom role dengan nilai 'user' untuk pengguna biasa
        ]);

        // Insert another regular user
        DB::table('users')->insert([
            'name' => 'Annisa',
            'email' => 'annisayusri7@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'user', // Tambahkan kolom role dengan nilai 'user' untuk pengguna biasa
        ]);
    }

}
