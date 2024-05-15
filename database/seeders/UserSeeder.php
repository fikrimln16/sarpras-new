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
                'email' => 'admin.pusat@gmail.com',
                'password' => Hash::make('password'),
                'role' => '1',
            ],
            [
                'name' => 'Admin PT',
                'email' => 'admin.pt@gmail.com',
                'password' => Hash::make('password'),
                'role' => '2',
            ],
        ]);
    }
}
