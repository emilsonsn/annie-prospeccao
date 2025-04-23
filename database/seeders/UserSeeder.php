<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@admin',
                'name' => 'Admin',
                'password' => Hash::make('admin')
            ],
            [
                'email' => 'user@user',
                'name' => 'User',
                'password' => Hash::make('user')
            ]
        ];

        foreach($users as $user){
            User::firstOrCreate(attributes: [
                'email' => $user['email']
            ], values: $user);
        }
    }
}
