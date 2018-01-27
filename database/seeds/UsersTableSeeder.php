<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username'			=>	'alireza',
			'email'				=>	'hi@alirezarazavi.ir',
			'avatar'			=>	'default.png',
			'password'			=>	bcrypt('123456'),
			'remember_token' 	=> 	str_random(100),
			'created_at'		=>	Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at'		=>	Carbon::now()->format('Y-m-d H:i:s')
		]);
    }
}
