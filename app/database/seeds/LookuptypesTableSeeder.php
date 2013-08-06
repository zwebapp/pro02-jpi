<?php

class LookuptypesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('lookup_types')->delete();

      $lookuptypes = array(
				['id' => 1, 'type' => 'order_status', 'created_at' => new DateTime ],
				['id' => 2, 'type' => 'user_types','created_at' => new DateTime ],
				['id' => 3, 'type' => 'security_questions', 'created_at' => new DateTime ]

      );

      // Uncomment the below to run the seeder
      DB::table('lookup_types')->insert($lookuptypes);
    }

}