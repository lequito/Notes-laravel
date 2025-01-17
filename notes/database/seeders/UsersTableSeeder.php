<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create multiple users
        DB::table('users')->insert([
            [
                'username' => 'user1@mail.com',
                'password' => bcrypt('123321'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'user2@mail.com',
                'password' => bcrypt('123321'),
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'username' => 'user3@mail.com',
                'password' => bcrypt('123321'),
                'created_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
