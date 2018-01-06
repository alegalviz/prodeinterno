<?php

class EquiposTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('equipos')->truncate();
        
		\DB::table('equipos')->insert(array (
			0 => 
			array (
				'id' => 1,
				'grupo_id' => 1,
				'codigo' => 'BRA',
				'nombre' => 'Brazil',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'grupo_id' => 1,
				'codigo' => 'HRV',
				'nombre' => 'Croatia',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'grupo_id' => 1,
				'codigo' => 'MEX',
				'nombre' => 'Mexico',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'grupo_id' => 1,
				'codigo' => 'CMR',
				'nombre' => 'Cameroon',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			4 => 
			array (
				'id' => 5,
				'grupo_id' => 2,
				'codigo' => 'ESP',
				'nombre' => 'Spain',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 => 
			array (
				'id' => 6,
				'grupo_id' => 2,
				'codigo' => 'NLD',
				'nombre' => 'Netherlands',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			6 => 
			array (
				'id' => 7,
				'grupo_id' => 2,
				'codigo' => 'CHL',
				'nombre' => 'Chile',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			7 => 
			array (
				'id' => 8,
				'grupo_id' => 2,
				'codigo' => 'AUS',
				'nombre' => 'Australia',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			8 => 
			array (
				'id' => 9,
				'grupo_id' => 3,
				'codigo' => 'COL',
				'nombre' => 'Colombia',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			9 => 
			array (
				'id' => 10,
				'grupo_id' => 3,
				'codigo' => 'GRC',
				'nombre' => 'Greece',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			10 => 
			array (
				'id' => 11,
				'grupo_id' => 3,
				'codigo' => 'CIV',
				'nombre' => 'Ivory Coast',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			11 => 
			array (
				'id' => 12,
				'grupo_id' => 3,
				'codigo' => 'JPN',
				'nombre' => 'Japan',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			12 => 
			array (
				'id' => 13,
				'grupo_id' => 4,
				'codigo' => 'URY',
				'nombre' => 'Uruguay',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			13 => 
			array (
				'id' => 14,
				'grupo_id' => 4,
				'codigo' => 'CRC',
				'nombre' => 'Costa Rica',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			14 => 
			array (
				'id' => 15,
				'grupo_id' => 4,
				'codigo' => 'ENG',
				'nombre' => 'England',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			15 => 
			array (
				'id' => 16,
				'grupo_id' => 4,
				'codigo' => 'ITA',
				'nombre' => 'Italy',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			16 => 
			array (
				'id' => 17,
				'grupo_id' => 5,
				'codigo' => 'CHE',
				'nombre' => 'Switzerland',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			17 => 
			array (
				'id' => 18,
				'grupo_id' => 5,
				'codigo' => 'ECU',
				'nombre' => 'Ecuador',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			18 => 
			array (
				'id' => 19,
				'grupo_id' => 5,
				'codigo' => 'FRA',
				'nombre' => 'France',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			19 => 
			array (
				'id' => 20,
				'grupo_id' => 5,
				'codigo' => 'HND',
				'nombre' => 'Honduras',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			20 => 
			array (
				'id' => 21,
				'grupo_id' => 6,
				'codigo' => 'ARG',
				'nombre' => 'Argentina',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			21 => 
			array (
				'id' => 22,
				'grupo_id' => 6,
				'codigo' => 'BIH',
				'nombre' => 'Bosnia and Herzegovina',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			22 => 
			array (
				'id' => 23,
				'grupo_id' => 6,
				'codigo' => 'IRN',
				'nombre' => 'Iran',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			23 => 
			array (
				'id' => 24,
				'grupo_id' => 6,
				'codigo' => 'NGA',
				'nombre' => 'Nigeria',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			24 => 
			array (
				'id' => 25,
				'grupo_id' => 7,
				'codigo' => 'DEU',
				'nombre' => 'Germany',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			25 => 
			array (
				'id' => 26,
				'grupo_id' => 7,
				'codigo' => 'PRT',
				'nombre' => 'Portugal',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			26 => 
			array (
				'id' => 27,
				'grupo_id' => 7,
				'codigo' => 'GHA',
				'nombre' => 'Ghana',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			27 => 
			array (
				'id' => 28,
				'grupo_id' => 7,
				'codigo' => 'USA',
				'nombre' => 'USA',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			28 => 
			array (
				'id' => 29,
				'grupo_id' => 8,
				'codigo' => 'BEL',
				'nombre' => 'Belgium',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			29 => 
			array (
				'id' => 30,
				'grupo_id' => 8,
				'codigo' => 'DZA',
				'nombre' => 'Algeria',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			30 => 
			array (
				'id' => 31,
				'grupo_id' => 8,
				'codigo' => 'RUS',
				'nombre' => 'Russia',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			31 => 
			array (
				'id' => 32,
				'grupo_id' => 8,
				'codigo' => 'KOR',
				'nombre' => 'Korea',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			32 => 
			array (
				'id' => 33,
				'grupo_id' => 9,
				'codigo' => 'NA',
				'nombre' => 'Vacío',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
