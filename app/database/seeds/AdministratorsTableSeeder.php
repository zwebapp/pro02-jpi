<?php

class AdministratorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('administrators')->delete();

        $administrators = array(
        	['name' => 'Saitama-sensei', 'username' => 'admin', 'password' => Hash::make('adminadmin'), 'created_at' => new DateTime],
        	['name' => 'Genos Cyborg', 'username' => 'genos', 'password' => Hash::make('genosgenos'), 'created_at' => new DateTime]
        );

      // Uncomment the below to run the seeder
      DB::table('administrators')->insert($administrators);
    }

}