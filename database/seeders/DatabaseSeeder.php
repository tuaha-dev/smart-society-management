<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Account
        User::create([
            'username' => 'admin_user',
            'password' => Hash::make('password123'),
            'role'     => 'Admin',
        ]);

        // 2. Resident Account
        User::create([
            'username' => 'resident_101',
            'password' => Hash::make('password123'),
            'role'     => 'Resident',
        ]);

        // 3. Security Guard Account
        User::create([
            'username' => 'gate_guard_1',
            'password' => Hash::make('password123'),
            'role'     => 'Guard',
        ]);
    }
}