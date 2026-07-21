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
        User::updateOrCreate(
            ['email' => 'admin@stayease.com'],
            [
                'name'        => 'Admin StayEase',
                'password'    => Hash::make('admin123'),
                'member_tier' => 'vip',
                'role'        => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'pelanggan@stayease.com'],
            [
                'name'        => 'Pelanggan Demo',
                'password'    => Hash::make('pelanggan123'),
                'member_tier' => 'standard',
                'role'        => 'pelanggan',
            ]
        );
    }
}
