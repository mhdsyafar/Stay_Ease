<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Hanya membuat 1 akun admin default untuk login pertama kali.
     */
    public function run(): void
    {
        User::create([
            'name'        => 'Admin',
            'email'       => 'admin@stayease.com',
            'password'    => Hash::make('password'),
            'member_tier' => 'standard',
        ]);
    }
}
