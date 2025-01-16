<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'password'
        ];

        User::query()->firstOrCreate($user);
    }
}
