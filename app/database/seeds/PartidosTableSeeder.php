<?php

class PartidosTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('partidos')->truncate();
        
		\DB::table('partidos')->insert(array (
			0 => 
			array (
				'id' => 1,
				'ronda' => 0,
				'estadio_id' => 12,
				'equipo1_id' => 1,
				'equipo2_id' => 2,
				'inicio' => '2014-06-12 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 21:51:22',
			),
			1 => 
			array (
				'id' => 2,
				'ronda' => 0,
				'estadio_id' => 7,
				'equipo1_id' => 3,
				'equipo2_id' => 4,
				'inicio' => '2014-06-13 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 21:48:56',
			),
			2 => 
			array (
				'id' => 3,
				'ronda' => 0,
				'estadio_id' => 11,
				'equipo1_id' => 5,
				'equipo2_id' => 6,
				'inicio' => '2014-06-13 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 16:51:36',
			),
			3 => 
			array (
				'id' => 4,
				'ronda' => 0,
				'estadio_id' => 3,
				'equipo1_id' => 7,
				'equipo2_id' => 8,
				'inicio' => '2014-06-13 18:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 16:55:31',
			),
			4 => 
			array (
				'id' => 5,
				'ronda' => 0,
				'estadio_id' => 1,
				'equipo1_id' => 9,
				'equipo2_id' => 10,
				'inicio' => '2014-06-14 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			5 => 
			array (
				'id' => 6,
				'ronda' => 0,
				'estadio_id' => 9,
				'equipo1_id' => 11,
				'equipo2_id' => 12,
				'inicio' => '2014-06-14 22:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			6 => 
			array (
				'id' => 7,
				'ronda' => 0,
				'estadio_id' => 5,
				'equipo1_id' => 13,
				'equipo2_id' => 14,
				'inicio' => '2014-06-14 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			7 => 
			array (
				'id' => 8,
				'ronda' => 0,
				'estadio_id' => 6,
				'equipo1_id' => 15,
				'equipo2_id' => 16,
				'inicio' => '2014-06-14 18:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			8 => 
			array (
				'id' => 9,
				'ronda' => 0,
				'estadio_id' => 2,
				'equipo1_id' => 17,
				'equipo2_id' => 18,
				'inicio' => '2014-06-15 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			9 => 
			array (
				'id' => 10,
				'ronda' => 0,
				'estadio_id' => 8,
				'equipo1_id' => 19,
				'equipo2_id' => 20,
				'inicio' => '2014-06-15 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			10 => 
			array (
				'id' => 11,
				'ronda' => 0,
				'estadio_id' => 10,
				'equipo1_id' => 21,
				'equipo2_id' => 22,
				'inicio' => '2014-06-15 19:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			11 => 
			array (
				'id' => 12,
				'ronda' => 0,
				'estadio_id' => 4,
				'equipo1_id' => 23,
				'equipo2_id' => 24,
				'inicio' => '2014-06-16 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			12 => 
			array (
				'id' => 13,
				'ronda' => 0,
				'estadio_id' => 11,
				'equipo1_id' => 25,
				'equipo2_id' => 26,
				'inicio' => '2014-06-16 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			13 => 
			array (
				'id' => 14,
				'ronda' => 0,
				'estadio_id' => 7,
				'equipo1_id' => 27,
				'equipo2_id' => 28,
				'inicio' => '2014-06-16 19:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			14 => 
			array (
				'id' => 15,
				'ronda' => 0,
				'estadio_id' => 1,
				'equipo1_id' => 29,
				'equipo2_id' => 30,
				'inicio' => '2014-06-17 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			15 => 
			array (
				'id' => 16,
				'ronda' => 0,
				'estadio_id' => 3,
				'equipo1_id' => 31,
				'equipo2_id' => 32,
				'inicio' => '2014-06-17 18:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			16 => 
			array (
				'id' => 17,
				'ronda' => 0,
				'estadio_id' => 5,
				'equipo1_id' => 1,
				'equipo2_id' => 3,
				'inicio' => '2014-06-17 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			17 => 
			array (
				'id' => 18,
				'ronda' => 0,
				'estadio_id' => 6,
				'equipo1_id' => 4,
				'equipo2_id' => 2,
				'inicio' => '2014-06-18 18:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			18 => 
			array (
				'id' => 19,
				'ronda' => 0,
				'estadio_id' => 10,
				'equipo1_id' => 5,
				'equipo2_id' => 7,
				'inicio' => '2014-06-18 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			19 => 
			array (
				'id' => 20,
				'ronda' => 0,
				'estadio_id' => 8,
				'equipo1_id' => 8,
				'equipo2_id' => 6,
				'inicio' => '2014-06-18 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			20 => 
			array (
				'id' => 21,
				'ronda' => 0,
				'estadio_id' => 2,
				'equipo1_id' => 9,
				'equipo2_id' => 11,
				'inicio' => '2014-06-19 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			21 => 
			array (
				'id' => 22,
				'ronda' => 0,
				'estadio_id' => 7,
				'equipo1_id' => 12,
				'equipo2_id' => 10,
				'inicio' => '2014-06-19 19:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			22 => 
			array (
				'id' => 23,
				'ronda' => 0,
				'estadio_id' => 12,
				'equipo1_id' => 13,
				'equipo2_id' => 15,
				'inicio' => '2014-06-19 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			23 => 
			array (
				'id' => 24,
				'ronda' => 0,
				'estadio_id' => 9,
				'equipo1_id' => 16,
				'equipo2_id' => 14,
				'inicio' => '2014-06-20 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			24 => 
			array (
				'id' => 25,
				'ronda' => 0,
				'estadio_id' => 11,
				'equipo1_id' => 17,
				'equipo2_id' => 19,
				'inicio' => '2014-06-20 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			25 => 
			array (
				'id' => 26,
				'ronda' => 0,
				'estadio_id' => 4,
				'equipo1_id' => 20,
				'equipo2_id' => 18,
				'inicio' => '2014-06-20 19:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			26 => 
			array (
				'id' => 27,
				'ronda' => 0,
				'estadio_id' => 1,
				'equipo1_id' => 21,
				'equipo2_id' => 23,
				'inicio' => '2014-06-21 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			27 => 
			array (
				'id' => 28,
				'ronda' => 0,
				'estadio_id' => 3,
				'equipo1_id' => 24,
				'equipo2_id' => 22,
				'inicio' => '2014-06-21 18:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			28 => 
			array (
				'id' => 29,
				'ronda' => 0,
				'estadio_id' => 5,
				'equipo1_id' => 25,
				'equipo2_id' => 27,
				'inicio' => '2014-06-21 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			29 => 
			array (
				'id' => 30,
				'ronda' => 0,
				'estadio_id' => 6,
				'equipo1_id' => 28,
				'equipo2_id' => 26,
				'inicio' => '2014-06-22 18:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			30 => 
			array (
				'id' => 31,
				'ronda' => 0,
				'estadio_id' => 10,
				'equipo1_id' => 29,
				'equipo2_id' => 31,
				'inicio' => '2014-06-22 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			31 => 
			array (
				'id' => 32,
				'ronda' => 0,
				'estadio_id' => 8,
				'equipo1_id' => 32,
				'equipo2_id' => 30,
				'inicio' => '2014-06-22 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			32 => 
			array (
				'id' => 33,
				'ronda' => 0,
				'estadio_id' => 2,
				'equipo1_id' => 4,
				'equipo2_id' => 1,
				'inicio' => '2014-06-23 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			33 => 
			array (
				'id' => 34,
				'ronda' => 0,
				'estadio_id' => 9,
				'equipo1_id' => 2,
				'equipo2_id' => 3,
				'inicio' => '2014-06-23 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			34 => 
			array (
				'id' => 35,
				'ronda' => 0,
				'estadio_id' => 4,
				'equipo1_id' => 8,
				'equipo2_id' => 5,
				'inicio' => '2014-06-23 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			35 => 
			array (
				'id' => 36,
				'ronda' => 0,
				'estadio_id' => 12,
				'equipo1_id' => 6,
				'equipo2_id' => 7,
				'inicio' => '2014-06-23 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			36 => 
			array (
				'id' => 37,
				'ronda' => 0,
				'estadio_id' => 3,
				'equipo1_id' => 12,
				'equipo2_id' => 9,
				'inicio' => '2014-06-24 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			37 => 
			array (
				'id' => 38,
				'ronda' => 0,
				'estadio_id' => 5,
				'equipo1_id' => 10,
				'equipo2_id' => 11,
				'inicio' => '2014-06-24 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			38 => 
			array (
				'id' => 39,
				'ronda' => 0,
				'estadio_id' => 7,
				'equipo1_id' => 16,
				'equipo2_id' => 13,
				'inicio' => '2014-06-24 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			39 => 
			array (
				'id' => 40,
				'ronda' => 0,
				'estadio_id' => 1,
				'equipo1_id' => 14,
				'equipo2_id' => 15,
				'inicio' => '2014-06-24 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			40 => 
			array (
				'id' => 41,
				'ronda' => 0,
				'estadio_id' => 6,
				'equipo1_id' => 20,
				'equipo2_id' => 17,
				'inicio' => '2014-06-25 16:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			41 => 
			array (
				'id' => 42,
				'ronda' => 0,
				'estadio_id' => 10,
				'equipo1_id' => 18,
				'equipo2_id' => 19,
				'inicio' => '2014-06-25 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			42 => 
			array (
				'id' => 43,
				'ronda' => 0,
				'estadio_id' => 8,
				'equipo1_id' => 24,
				'equipo2_id' => 21,
				'inicio' => '2014-06-25 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			43 => 
			array (
				'id' => 44,
				'ronda' => 0,
				'estadio_id' => 11,
				'equipo1_id' => 22,
				'equipo2_id' => 23,
				'inicio' => '2014-06-25 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			44 => 
			array (
				'id' => 45,
				'ronda' => 0,
				'estadio_id' => 9,
				'equipo1_id' => 28,
				'equipo2_id' => 25,
				'inicio' => '2014-06-26 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			45 => 
			array (
				'id' => 46,
				'ronda' => 0,
				'estadio_id' => 2,
				'equipo1_id' => 26,
				'equipo2_id' => 27,
				'inicio' => '2014-06-26 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			46 => 
			array (
				'id' => 47,
				'ronda' => 0,
				'estadio_id' => 12,
				'equipo1_id' => 32,
				'equipo2_id' => 29,
				'inicio' => '2014-06-26 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			47 => 
			array (
				'id' => 48,
				'ronda' => 0,
				'estadio_id' => 4,
				'equipo1_id' => 30,
				'equipo2_id' => 31,
				'inicio' => '2014-06-26 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			48 => 
			array (
				'id' => 49,
				'ronda' => 8,
				'estadio_id' => 1,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-06-28 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:23:09',
			),
			49 => 
			array (
				'id' => 50,
				'ronda' => 8,
				'estadio_id' => 10,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-06-28 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:23:26',
			),
			50 => 
			array (
				'id' => 51,
				'ronda' => 8,
				'estadio_id' => 5,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-06-29 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:23:49',
			),
			51 => 
			array (
				'id' => 52,
				'ronda' => 8,
				'estadio_id' => 9,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-06-29 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:24:02',
			),
			52 => 
			array (
				'id' => 53,
				'ronda' => 8,
				'estadio_id' => 2,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-06-30 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:24:12',
			),
			53 => 
			array (
				'id' => 54,
				'ronda' => 8,
				'estadio_id' => 8,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-06-30 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:24:25',
			),
			54 => 
			array (
				'id' => 55,
				'ronda' => 8,
				'estadio_id' => 12,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-01 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:25:02',
			),
			55 => 
			array (
				'id' => 56,
				'ronda' => 8,
				'estadio_id' => 11,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-01 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:25:28',
			),
			56 => 
			array (
				'id' => 57,
				'ronda' => 4,
				'estadio_id' => 5,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-04 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:26:06',
			),
			57 => 
			array (
				'id' => 58,
				'ronda' => 4,
				'estadio_id' => 10,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-04 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:25:53',
			),
			58 => 
			array (
				'id' => 59,
				'ronda' => 4,
				'estadio_id' => 11,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-05 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:26:30',
			),
			59 => 
			array (
				'id' => 60,
				'ronda' => 4,
				'estadio_id' => 2,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-05 13:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:26:18',
			),
			60 => 
			array (
				'id' => 61,
				'ronda' => 2,
				'estadio_id' => 1,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-08 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:26:42',
			),
			61 => 
			array (
				'id' => 62,
				'ronda' => 2,
				'estadio_id' => 12,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-09 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:27:02',
			),
			62 => 
			array (
				'id' => 63,
				'ronda' => 1,
				'estadio_id' => 2,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-12 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:27:13',
			),
			63 => 
			array (
				'id' => 64,
				'ronda' => 1,
				'estadio_id' => 10,
				'equipo1_id' => 33,
				'equipo2_id' => 33,
				'inicio' => '2014-07-13 17:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '2014-06-01 19:27:24',
			),
		));
	}

}
