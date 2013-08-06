<?php

class ClientsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('clients')->delete();

        $clients = array(
        	[
        		'lookup_user_type' => 6,
                'lastname' => 'Freecs',
        		'firstname' => 'Gon',
        		'company_name' => NULL,
        		'email' => 'gonf@hxh.com',
        		'address' => 'Calm Island',
        		'company_address' => NULL,
        		'contact_no' => '888 99 55',
        		'birthday' => '03-03-90',
        		'lookup_security_question' => 8,
        		'security_question_answer' => 'Kuroro',
        		'is_verified' => 1,
                'created_at' => new DateTime,
        		'user_id' => 3
      		],
        	[
        		'lookup_user_type' => 6,
                'lastname' => 'Zordic',
        		'firstname' => 'Kilua',
        		'company_name' => NULL,
        		'email' => 'kilua@zordic.com',
        		'address' => 'Mt. Sinai',
        		'company_address' => NULL,
        		'contact_no' => '888 99 77',
        		'birthday' => '05-05-92',
        		'lookup_security_question' => 10,
        		'security_question_answer' => 'Ramen',
        		'is_verified' => 1,
        		'created_at' => new DateTime,
                'user_id' => 4
      		],
        	[
        		'lookup_user_type' => 7,
                'lastname' => 'Netero',
        		'firstname' => 'Chairman',
        		'company_name' => 'Hunter Association',
        		'email' => 'net@hunter.com',
        		'address' => NULL,
        		'company_address' => 'York New City',
        		'contact_no' => '555 88 77',
        		'birthday' => NULL,
        		'lookup_security_question' => 9,
        		'security_question_answer' => 'netty',
        		'is_verified' => 1,
        		'created_at' => new DateTime,
                'user_id' => 5
      		]
        );

      // Uncomment the below to run the seeder
  	  DB::table('clients')->insert($clients);
    }

}