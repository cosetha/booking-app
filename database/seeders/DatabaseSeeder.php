<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@email.com',
            'address' => 'Jalan jalan',
            'telephone' => '081333879500',
            'level' => 'User',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@email.com',
            'address' => 'Jalan jalan',
            'telephone' => '081333879500',
            'level' => 'Admin',
            'password' => bcrypt('password'),
        ]);
    }
}
