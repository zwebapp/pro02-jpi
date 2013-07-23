<?php

class ProductsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('products')->delete();

        $products = array(
        	[ 'category_id' => 1 , 'name' => 'White Tissue', 'description' => 'Its White', 'created_at' => new DateTime],
        	[ 'category_id' => 1 , 'name' => 'Brown Tissue', 'description' => 'Its brown', 'created_at' => new DateTime],
        	[ 'category_id' => 1 , 'name' => 'Gray Tissue', 'description' => 'Its Gray', 'created_at' => new DateTime],
        	[ 'category_id' => 1 , 'name' => 'Another Color Tissue', 'description' => 'Yeah!', 'created_at' => new DateTime],
        	[ 'category_id' => 1 , 'name' => 'Dirty Tissue', 'description' => 'Used . . somehow', 'created_at' => new DateTime],
        	[ 'category_id' => 1 , 'name' => 'Starbucks\'s tissue ', 'description' => 'Quality indeed!', 'created_at' => new DateTime],
        	[ 'category_id' => 1 , 'name' => 'Jobi\'s tissue', 'description' => 'Immitation of the original!', 'created_at' => new DateTime],



        	[ 'category_id' => 2 , 'name' => 'Power House', 'description' => 'Power house handryer', 'created_at' => new DateTime],
        	[ 'category_id' => 2 , 'name' => 'SMsssss', 'description' => 'SM Malls\' Handryers', 'created_at' => new DateTime],
        	[ 'category_id' => 2 , 'name' => 'Pinky', 'description' => 'Pinkish handryer', 'created_at' => new DateTime],



        	[ 'category_id' => 3 , 'name' => 'Lysol', 'description' => 'Lysol Aerosol Spray', 'created_at' => new DateTime],
        	[ 'category_id' => 3 , 'name' => 'Aero Soul', 'description' => 'Soul soothing fragrance', 'created_at' => new DateTime],
        	[ 'category_id' => 3 , 'name' => 'Air O Seoul', 'description' => 'Aerosol from Korea', 'created_at' => new DateTime],
        	[ 'category_id' => 3 , 'name' => 'Air Spray', 'description' => 'Local brand', 'created_at' => new DateTime],



        	[ 'category_id' => 4 , 'name' => 'Safeguard', 'description' => 'Common hand soap', 'created_at' => new DateTime],
        	[ 'category_id' => 4 , 'name' => 'Dove', 'description' => 'Soap for women', 'created_at' => new DateTime],
        	[ 'category_id' => 4 , 'name' => 'Likas Papaya', 'description' => 'If whitening soap is not so mainstream', 'created_at' => new DateTime],
        	[ 'category_id' => 4 , 'name' => 'Silka', 'description' => 'Likas\'s foes ' , 'created_at' => new DateTime],
        	[ 'category_id' => 4 , 'name' => 'Tide', 'description' => 'Gives minor feeling of taking good care of your clothes!', 'created_at' => new DateTime],



        	[ 'category_id' => 5 , 'name' => 'Mop', 'description' => 'Time for all around cleaning', 'created_at' => new DateTime],
        );

      // Uncomment the below to run the seeder
      DB::table('products')->insert($products);
    }

}