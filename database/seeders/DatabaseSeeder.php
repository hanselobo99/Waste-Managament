<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'driver1',
            'email' => 'driver1@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
            'role' => 'driver',
        ]);
        User::create([
            'name' => 'driver2',
            'email' => 'driver2@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
            'role' => 'driver',
        ]);
        User::create([
            'name' => 'driver3',
            'email' => 'driver3@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
            'role' => 'driver',
        ]);
        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
        ]);
        User::create([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '9876543219',
        ]);
    }
}
