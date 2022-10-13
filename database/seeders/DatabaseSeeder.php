<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder

{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('123'),
            'role' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@bit.com',
            'password' => Hash::make('123456789'),
            'role' => 2
        ]);
    }
}
