<?php

class AdministratorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('administrators')->delete();

        $administrators = array(
        	['name' => 'Saitama-sensei', 'username' => 'admin', 'password' => 'adminadmin', 'created_at' => new DateTime],
        	['name' => 'Genos Cyborg', 'username' => 'genos', 'password' => 'genosgenos', 'created_at' => new DateTime]
        );

      // Uncomment the below to run the seeder
      DB::table('administrators')->insert($administrators);
    }

}