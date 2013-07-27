<?php

class AdministratorsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('administrators')->delete();

        $administrators = array(
        	['name' => 'Saitama-sensei', 'created_at' => new DateTime, 'user_id' => 1],
        	['name' => 'Genos Cyborg', 'created_at' => new DateTime, 'user_id' => 2]
        );

      // Uncomment the below to run the seeder
      DB::table('administrators')->insert($administrators);
    }

}