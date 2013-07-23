<?php

class ClientsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('clients')->delete();

        $clients = array(
        	[
        		'lookup_user_type' => 6,
        		'full_name' => 'Gon Freecs',
        		'company_name' => '',
        		'password' => Hash::make('gonfgonf'),
        		'email' => 'gonf@hxh.com',
        		'address' => 'Calm Island',
        		'company_address' => '',
        		'contact_no' => '888 99 55',
        		'birthday' => '03-03-90',
        		'lookup_security_question' => 8,
        		'security_question_answer' => 'Kuroro',
        		'is_validated' => 1,
        		'created_at' => new DateTime
      		],
        	[
        		'lookup_user_type' => 6,
        		'full_name' => 'Kilua Zordic',
        		'company_name' => '',
        		'password' => Hash::make('kiluakilua'),
        		'email' => 'kilua@zordic.com',
        		'address' => 'Mt. Sinai',
        		'company_address' => '',
        		'contact_no' => '888 99 77',
        		'birthday' => '05-05-92',
        		'lookup_security_question' => 10,
        		'security_question_answer' => 'Ramen',
        		'is_validated' => 1,
        		'created_at' => new DateTime
      		],
        	[
        		'lookup_user_type' => 7,
        		'full_name' => 'Netero',
        		'company_name' => 'Hunter Association',
        		'password' => Hash::make('hunterhunter'),
        		'email' => 'net@hunter.com',
        		'address' => '',
        		'company_address' => 'York New City',
        		'contact_no' => '555 88 77',
        		'birthday' => '',
        		'lookup_security_question' => 9,
        		'security_question_answer' => 'netty',
        		'is_validated' => 1,
        		'created_at' => new DateTime
      		]
        );

      // Uncomment the below to run the seeder
  	  DB::table('clients')->insert($clients);
    }

}