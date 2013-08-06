<?php

class LookupsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('lookups')->delete();

        $lookups = array(
        	['lookup_type_id' => 1, 'value' => 'Pending'],
        	['lookup_type_id' => 1, 'value' => 'Rejected'],
        	['lookup_type_id' => 1, 'value' => 'For Review'],
        	['lookup_type_id' => 1, 'value' => 'Approved'],
        	['lookup_type_id' => 1, 'value' => 'Closed'],

        	['lookup_type_id' => 2, 'value' => 'Personal'],
        	['lookup_type_id' => 2, 'value' => 'Business'],

        	['lookup_type_id' => 3, 'value' => 'What is the name of your first pet?'],
        	['lookup_type_id' => 3, 'value' => 'What is your mother\'s maiden name?'],
        	['lookup_type_id' => 3, 'value' => 'What is your favorite food?'],
        	['lookup_type_id' => 3, 'value' => 'Where did you grow up?'],
        	['lookup_type_id' => 3, 'value' => 'Who is your bestfriend?']
        );

        // Uncomment the below to run the seeder
        DB::table('lookups')->insert($lookups);
    }

}