<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
		User::create([
			'name' => 'John',
			'email' => 'john@test.com',
			'password' => Hash::make('12345678'),
			'role' => 'user',
			]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Admin One',
            'email' => 'adminone@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User One',
            'email' => 'userone@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
    }
}
