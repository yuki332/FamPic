<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'yuki',
        	'email' => 'yuki@email.com',
        	'password' => bcrypt('secret')
        ]);

        DB::table('users')->insert([
        	'username' => 'asuka',
        	'email' => 'asuka@email.com',
        	'password' => bcrypt('secret')
        ]);
    }
}
