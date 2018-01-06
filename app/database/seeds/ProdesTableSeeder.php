<?php

class ProdesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('prodes')->truncate();
        
		\DB::table('prodes')->insert(array (
			0 => 
			array (
				'id' => 1,
				'logoempresa' => 'logoempresa.png',
				'puntajeaciertoexacto' => 5,
				'puntajeaciertoparcial' => 3,
				'bannerfixture' => 'bannerempresafixture.png',
				'bannerlogin' => 'bannerlogin.png',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 03:20:12',
			),
		));
	}

}
