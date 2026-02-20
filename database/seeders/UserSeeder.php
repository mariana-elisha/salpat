<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Receptionist User',
                'email' => 'receptionist@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'receptionist',
            ],
            [
                'name' => 'Chef User',
                'email' => 'chef@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'chef',
            ],
            [
                'name' => 'Housekeeping User',
                'email' => 'housekeeping@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'housekeeping',
            ],
            [
                'name' => 'Bar Keeper User',
                'email' => 'barkeeper@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'barkeeper',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'manager',
            ],
            [
                'name' => 'Test User',
                'email' => 'user@salpatcamp.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}
