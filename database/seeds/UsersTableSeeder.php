<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

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
            'username' => 'alireza',
            'email' => 'hi@alirezarazavi.ir',
            'avatar' => 'default.png',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(100),
        ]);
    }
}
