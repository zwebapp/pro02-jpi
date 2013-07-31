<?php

class AgentsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('agents')->delete();

        $agents = array(
        	['information' => json_encode(['full_name' => 'Piri Piri Warrior', 'email_address' => 'piri2@onepunch.com', 'address' => 'C-City', 'birthday' => '03-27-1988', 'contact_no' => '99933300']), 'created_at' => new DateTime],
        	['information' => json_encode(['full_name' => 'Super Alloy Darkshine', 'email_address' => 'superall@onepunch.com', 'address' => 'A-City', 'birthday' => '03-27-1988', 'contact_no' => '99933300']), 'created_at' => new DateTime],
        	['information' => json_encode(['full_name' => 'Metal Knight', 'email_address' => 'mk@onepunch.com', 'address' => 'H-City', 'birthday' => '03-27-1988', 'contact_no' => '99933300']), 'created_at' => new DateTime],
        	['information' => json_encode(['full_name' => 'Light Speed Slash', 'email_address' => 'light@onepunch.com', 'address' => 'A-City', 'birthday' => '03-27-1988', 'contact_no' => '99933300']), 'created_at' => new DateTime]
        );

      // Uncomment the below to run the seeder
      DB::table('agents')->insert($agents);
    }

}