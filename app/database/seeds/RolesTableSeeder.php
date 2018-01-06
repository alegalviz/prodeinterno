<?php

class RolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('roles')->truncate();
        
		\DB::table('roles')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'admin',
				'created_at' => '2014-05-19 12:06:11',
				'updated_at' => '2014-05-19 12:06:11',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'comment',
				'created_at' => '2014-05-19 12:06:11',
				'updated_at' => '2014-05-19 12:06:11',
			),
		));
	}

}
