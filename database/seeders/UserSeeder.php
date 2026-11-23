<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'João Silva',
                'email' => 'joao@gmail.com',
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@gmail.com',
            ],
            [
                'name' => 'Pedro Costa',
                'email' => 'pedro@gmail.com',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make($user['email']),
                    'role' => User::TYPE_REGULAR_USER,
                    'email_verified_at' => now(),
                ]
            );
        }
    }
}
