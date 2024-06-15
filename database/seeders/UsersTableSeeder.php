<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "admin";
        $user->email = 'huy@gmail.com';
        $user->password = '123456';
        $user->save();

        $user = new User();
        $user->name = "user";
        $user->email = 'user@example.com';
        $user->password = '123456';
        $user->save();
    }
}