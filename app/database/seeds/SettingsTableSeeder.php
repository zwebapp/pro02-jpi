<?php

class SettingsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('settings')->delete();

		$settings = array(
			[ 'recipients' => 'john@doe.com, jane@doe.com, mike@thepopper.net', 'created_at' => new DateTime, 'updated_at' => new DateTime ]
		);

		// Uncomment the below to run the seeder
		DB::table('settings')->insert($settings);
	}

}