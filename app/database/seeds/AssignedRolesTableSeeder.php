<?php

class AssignedRolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('assigned_roles')->truncate();
        
		\DB::table('assigned_roles')->insert(array (
			0 => 
			array (
				'id' => 1,
				'user_id' => 1,
				'role_id' => 1,
			),
		));
	}

}
