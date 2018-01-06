<?php

class ResultadosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('resultados')->truncate();
        
		\DB::table('resultados')->insert(array (
			0 => 
			array (
				'id' => 8,
				'partido_id' => 1,
				'marcador_equipo1' => 1,
				'marcador_equipo2' => 3,
				'ganador_equipo_id' => 1,
				'created_at' => '2014-06-01 04:29:29',
				'updated_at' => '2014-06-01 21:51:23',
			),
			1 => 
			array (
				'id' => 9,
				'partido_id' => 2,
				'marcador_equipo1' => 1,
				'marcador_equipo2' => 1,
				'ganador_equipo_id' => 3,
				'created_at' => '2014-06-01 16:29:54',
				'updated_at' => '2014-06-01 21:48:56',
			),
		));
	}

}
