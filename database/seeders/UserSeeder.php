<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 1 Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'phone' => '081234567890',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create 1 Regular User
        User::create([
            'name' => 'Sebastian',
            'email' => 'user@gmail.com',
            'phone' => '081234567891',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}