<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('LookuptypesTableSeeder');
		$this->call('LookupsTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('AdministratorsTableSeeder');
		$this->call('AgentsTableSeeder');
		$this->call('ClientsTableSeeder');
		$this->call('AgentsTableSeeder');
	}

}