<?php

class CategoriesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('categories')->delete();

        $categories = array(
        	[
	        	'name' => 'Tissue Papers', 
	        	'description' => 'Clean, white and good smelling tissue papers for your needs!', 
	        	'created_at' => new DateTime
        	],

        	[
        		'name' => 'Hand Dryers', 
        		'description' => 'Lists of Hand Dryers perfectly made for your business!', 
        		'created_at' => new DateTime
        	],

        	[
        		'name' => 'Aerosols', 
        		'description' => 'Feel the fragrance of quality aerosols.', 
        		'created_at' => new DateTime
        	],

        	[
        		'name' => 'Hand Soaps', 
        		'description' => 'Best sellings hand soaps.', 
        		'created_at' => new DateTime
      		],

        	[
        		'name' => 'Miscellaneous', 
        		'description' => 'Other items that suits your needs.', 
        		'created_at' => new DateTime
      		],
        );

       // Uncomment the below to run the seeder
       DB::table('categories')->insert($categories);
    }

}