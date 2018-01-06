<?php

class PuntajesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('puntajes')->truncate();
        
		\DB::table('puntajes')->insert(array (
			0 => 
			array (
				'id' => 31,
				'user_id' => 1,
				'aciertosparciales' => 0,
				'aciertosexactos' => 0,
				'total' => 0,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			1 => 
			array (
				'id' => 32,
				'user_id' => 6,
				'aciertosparciales' => 0,
				'aciertosexactos' => 0,
				'total' => 0,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			2 => 
			array (
				'id' => 33,
				'user_id' => 13,
				'aciertosparciales' => 0,
				'aciertosexactos' => 0,
				'total' => 0,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			3 => 
			array (
				'id' => 34,
				'user_id' => 14,
				'aciertosparciales' => 1,
				'aciertosexactos' => 0,
				'total' => 3,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			4 => 
			array (
				'id' => 35,
				'user_id' => 11,
				'aciertosparciales' => 0,
				'aciertosexactos' => 0,
				'total' => 0,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			5 => 
			array (
				'id' => 36,
				'user_id' => 7,
				'aciertosparciales' => 1,
				'aciertosexactos' => 0,
				'total' => 3,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			6 => 
			array (
				'id' => 37,
				'user_id' => 12,
				'aciertosparciales' => 0,
				'aciertosexactos' => 0,
				'total' => 0,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
			7 => 
			array (
				'id' => 38,
				'user_id' => 15,
				'aciertosparciales' => 0,
				'aciertosexactos' => 0,
				'total' => 0,
				'created_at' => '2014-06-01 21:51:23',
				'updated_at' => '2014-06-01 21:51:23',
			),
		));
	}

}
