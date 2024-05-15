<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
    public function run(): void {
        DB::table('users')->insert([
            [
                'name' => 'Admin Pusat',
                'email' => 'hikmal@gmail.com',
                'password' => Hash::make('hikmal123'),
                'role' => '1',
            ],
        ]);
    }
}