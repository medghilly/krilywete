<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class adminDemo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'medou@email.com'],
            [
                'name' => 'Mouhamedou',
                'password' => Hash::make('pass1234'),
                'role' => 'admin',
                'avatar' => '/images/avatars/avatar_2.jpg',
            ]
        );
        User::updateOrCreate(
            ['email' => 'mghilly@email.com'],
            [
                'name' => 'Med ghilly',
                'password' => Hash::make('pass1234'),
                'role' => 'client',
                'avatar' => '/images/avatars/avatar_6.jpg',
            ]
        );
        User::updateOrCreate(
            ['email' => 'cheikhani@email.com'],
            [
                'name' => 'cheikhani',
                'password' => Hash::make('pass1234'),
                'role' => 'client',
                'avatar' => '/images/avatars/avatar_6.jpg',
            ]
        );
    }
}
