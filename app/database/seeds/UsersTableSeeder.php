<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('users')->delete();

        $users = array(

        	['username' => 'admin', 'password' => Hash::make('adminadmin'), 'last_logged_in' => new DateTime, 'is_client' => 0],
        	['username' => 'genos', 'password' => Hash::make('genosgenos'), 'last_logged_in' => new DateTime, 'is_client' => 0],
        	['username' => 'gonfreecs', 'password' => Hash::make('gongon'), 'last_logged_in' => new DateTime, 'is_client' => 1],
        	['username' => 'kilua', 'password' => Hash::make('kiluakilua'), 'last_logged_in' => new DateTime, 'is_client' => 1],
        	['username' => 'netero', 'password' => Hash::make('neteronetero'), 'last_logged_in' => new DateTime, 'is_client' => 1],

        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}