<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'angga',
                'email' => 'angga@email.com',
                'password' => bcrypt('password'),
                'role' => 'Admin',
                'phone' => '081357046700',
            ],
            [
                'name' => 'Farhan',
                'email' => 'farhan10@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'Admin',
                'phone' => '08846987968',
            ],
            [
                'name' => 'Farid Angga',
                'email' => 'farid@gentlebaby.com',
                'password' => bcrypt('password'),
                'role' => 'Super Admin',
                'phone' => '081234567890',
            ],
        ];

        foreach ($admins as $admin) {
            \App\Models\User::create($admin);
        }
    }
}
