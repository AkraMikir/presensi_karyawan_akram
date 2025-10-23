<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@presensipro.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Create sample karyawan user
        User::create([
            'name' => 'Ahmad Rizki',
            'email' => 'ahmad.rizki@presensipro.com',
            'password' => Hash::make('karyawan123'),
            'role' => 'karyawan',
        ]);

        // Create sample karyawan user 2
        User::create([
            'name' => 'Sarah Putri',
            'email' => 'sarah.putri@presensipro.com',
            'password' => Hash::make('karyawan123'),
            'role' => 'karyawan',
        ]);
    }
}