<?php

class AgentsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('agents')->delete();

        $agents = array(
        	['information' => '{full_name: \'Piri Piri Warrior\', address: \'C-City\', age: 24, contact_no: \'99933300\'}', 'created_at' => new DateTime],
        	['information' => '{full_name: \'Super Alloy Darkshine\', address: \'A-City\', age: 30, contact_no: \'99933300\'}', 'created_at' => new DateTime],
        	['information' => '{full_name: \'Metal Knight\', address: \'H-City\', age: 55, contact_no: \'99933300\'}', 'created_at' => new DateTime],
        	['information' => '{full_name: \'Light Speed Slash\', address: \'A-City\', age: 20, contact_no: \'99933300\'}', 'created_at' => new DateTime]
        );

      // Uncomment the below to run the seeder
      DB::table('agents')->insert($agents);
    }

}