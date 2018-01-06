<?php

class ApuestasTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('apuestas')->truncate();
        
		\DB::table('apuestas')->insert(array (
			0 => 
			array (
				'id' => 2,
				'partido_id' => 5,
				'user_id' => 1,
				'marcador_equipo1' => 3,
				'marcador_equipo2' => 0,
				'created_at' => '2014-05-19 21:44:16',
				'updated_at' => '2014-05-19 21:44:16',
			),
			1 => 
			array (
				'id' => 3,
				'partido_id' => 1,
				'user_id' => 1,
				'marcador_equipo1' => 4,
				'marcador_equipo2' => 3,
				'created_at' => '2014-05-19 21:45:01',
				'updated_at' => '2014-05-19 22:42:33',
			),
			2 => 
			array (
				'id' => 6,
				'partido_id' => 1,
				'user_id' => 6,
				'marcador_equipo1' => 5,
				'marcador_equipo2' => 3,
				'created_at' => '2014-06-01 02:38:24',
				'updated_at' => '2014-06-01 02:38:27',
			),
			3 => 
			array (
				'id' => 7,
				'partido_id' => 2,
				'user_id' => 1,
				'marcador_equipo1' => 3,
				'marcador_equipo2' => 3,
				'created_at' => '2014-06-01 16:28:50',
				'updated_at' => '2014-06-01 16:28:53',
			),
			4 => 
			array (
				'id' => 8,
				'partido_id' => 2,
				'user_id' => 6,
				'marcador_equipo1' => 1,
				'marcador_equipo2' => 1,
				'created_at' => '2014-06-01 16:29:13',
				'updated_at' => '2014-06-01 16:29:16',
			),
			5 => 
			array (
				'id' => 9,
				'partido_id' => 3,
				'user_id' => 1,
				'marcador_equipo1' => 5,
				'marcador_equipo2' => 5,
				'created_at' => '2014-06-01 16:30:44',
				'updated_at' => '2014-06-01 16:30:47',
			),
			6 => 
			array (
				'id' => 10,
				'partido_id' => 3,
				'user_id' => 6,
				'marcador_equipo1' => 5,
				'marcador_equipo2' => 2,
				'created_at' => '2014-06-01 16:30:54',
				'updated_at' => '2014-06-01 16:30:57',
			),
			7 => 
			array (
				'id' => 11,
				'partido_id' => 4,
				'user_id' => 1,
				'marcador_equipo1' => 3,
				'marcador_equipo2' => 2,
				'created_at' => '2014-06-01 16:54:13',
				'updated_at' => '2014-06-01 16:54:16',
			),
			8 => 
			array (
				'id' => 12,
				'partido_id' => 4,
				'user_id' => 6,
				'marcador_equipo1' => 2,
				'marcador_equipo2' => 1,
				'created_at' => '2014-06-01 16:54:37',
				'updated_at' => '2014-06-01 16:54:40',
			),
			9 => 
			array (
				'id' => 13,
				'partido_id' => 1,
				'user_id' => 13,
				'marcador_equipo1' => 4,
				'marcador_equipo2' => 4,
				'created_at' => '2014-06-01 21:38:28',
				'updated_at' => '2014-06-01 21:38:31',
			),
			10 => 
			array (
				'id' => 14,
				'partido_id' => 1,
				'user_id' => 14,
				'marcador_equipo1' => 1,
				'marcador_equipo2' => 2,
				'created_at' => '2014-06-01 21:38:46',
				'updated_at' => '2014-06-01 21:38:48',
			),
			11 => 
			array (
				'id' => 15,
				'partido_id' => 1,
				'user_id' => 11,
				'marcador_equipo1' => 5,
				'marcador_equipo2' => 2,
				'created_at' => '2014-06-01 21:39:05',
				'updated_at' => '2014-06-01 21:39:07',
			),
			12 => 
			array (
				'id' => 16,
				'partido_id' => 1,
				'user_id' => 7,
				'marcador_equipo1' => 2,
				'marcador_equipo2' => 3,
				'created_at' => '2014-06-01 21:45:46',
				'updated_at' => '2014-06-01 21:45:49',
			),
			13 => 
			array (
				'id' => 17,
				'partido_id' => 1,
				'user_id' => 12,
				'marcador_equipo1' => 2,
				'marcador_equipo2' => 1,
				'created_at' => '2014-06-01 21:46:35',
				'updated_at' => '2014-06-01 21:46:39',
			),
			14 => 
			array (
				'id' => 18,
				'partido_id' => 1,
				'user_id' => 15,
				'marcador_equipo1' => 4,
				'marcador_equipo2' => 2,
				'created_at' => '2014-06-01 21:50:57',
				'updated_at' => '2014-06-01 21:51:01',
			),
		));
	}

}
