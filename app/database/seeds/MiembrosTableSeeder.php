<?php

class MiembrosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('miembros')->truncate();
        
		\DB::table('miembros')->insert(array (
			0 => 
			array (
				'id' => 9,
				'user_id' => 6,
				'nombre' => 'Alek',
				'email' => 'g@g.com',
				'created_at' => '2014-06-01 02:37:44',
				'updated_at' => '2014-06-01 02:37:44',
			),
			1 => 
			array (
				'id' => 10,
				'user_id' => 6,
				'nombre' => 'Francisco',
				'email' => 'f@f.com',
				'created_at' => '2014-06-01 02:37:44',
				'updated_at' => '2014-06-01 02:37:44',
			),
			2 => 
			array (
				'id' => 11,
				'user_id' => 6,
				'nombre' => 'Mara',
				'email' => 'l@l.com',
				'created_at' => '2014-06-01 02:37:44',
				'updated_at' => '2014-06-01 02:37:44',
			),
			3 => 
			array (
				'id' => 12,
				'user_id' => 6,
				'nombre' => 'Alfredo',
				'email' => 's@s',
				'created_at' => '2014-06-01 02:37:44',
				'updated_at' => '2014-06-01 02:37:44',
			),
			4 => 
			array (
				'id' => 13,
				'user_id' => 7,
				'nombre' => 'Alek',
				'email' => 'g@g.com',
				'created_at' => '2014-06-01 21:33:10',
				'updated_at' => '2014-06-01 21:33:10',
			),
			5 => 
			array (
				'id' => 14,
				'user_id' => 7,
				'nombre' => 'Francisco',
				'email' => 'f@f.com',
				'created_at' => '2014-06-01 21:33:10',
				'updated_at' => '2014-06-01 21:33:10',
			),
			6 => 
			array (
				'id' => 15,
				'user_id' => 8,
				'nombre' => 'Alek',
				'email' => 'g@g.com',
				'created_at' => '2014-06-01 21:33:45',
				'updated_at' => '2014-06-01 21:33:45',
			),
			7 => 
			array (
				'id' => 16,
				'user_id' => 8,
				'nombre' => 'Alvaro',
				'email' => 'f@f.com',
				'created_at' => '2014-06-01 21:33:45',
				'updated_at' => '2014-06-01 21:33:45',
			),
		));
	}

}
