<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->truncate();

        // Create multiple users
        $users = [
            // HR
            [
                'first_name' => 'HR Manager',
                'last_name' => 'HR',
                'email' => 'hr@mail.com',
                'password' => Hash::make('12345678'),
            ],
            // management
            [
                'first_name' => 'Mr Manager',
                'last_name' => 'MGT',
                'email' => 'mgt@mail.com',
                'password' => Hash::make('12345678'),
            ],
            // APPLICANT
            [
                'first_name' => 'Patel',
                'last_name' => 'Yokozhuna',
                'email' => 'patel@mail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'first_name' => 'John',
                'last_name' => 'Kamau',
                'email' => 'john@mail.com',
                'password' => Hash::make('12345678'), 
            ],
            [
                'first_name' => 'Philomena',
                'last_name' => 'Mwanza',
                'email' => 'philomena@mail.com',
                'password' => Hash::make('12345678'), 
            ],
        ];

        // Insert data
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
