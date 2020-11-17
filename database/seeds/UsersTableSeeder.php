<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'login' => 'admin',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'login' => 'user',
            'password' => bcrypt('password'),
        ]);
    }
}
