<?php

class LookupsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('lookups')->delete();

        $lookups = array(
        	['lookupTypes_id' => 1, 'value' => 'Pending'],
        	['lookupTypes_id' => 1, 'value' => 'Rejected'],
        	['lookupTypes_id' => 1, 'value' => 'For Review'],
        	['lookupTypes_id' => 1, 'value' => 'Approved'],
        	['lookupTypes_id' => 1, 'value' => 'Closed'],

        	['lookupTypes_id' => 2, 'value' => 'Personal'],
        	['lookupTypes_id' => 2, 'value' => 'Business'],

        	['lookupTypes_id' => 3, 'value' => 'What is the name of your first pet?'],
        	['lookupTypes_id' => 3, 'value' => 'What is your mother\'s maiden name?'],
        	['lookupTypes_id' => 3, 'value' => 'What is your favorite food?'],
        	['lookupTypes_id' => 3, 'value' => 'Where did you grow up?'],
        	['lookupTypes_id' => 3, 'value' => 'Who is your bestfriend?']
        );

        // Uncomment the below to run the seeder
        DB::table('lookups')->insert($lookups);
    }

}