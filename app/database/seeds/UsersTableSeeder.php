<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('users')->truncate();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'username' => 'admin',
				'email' => 'admin@gmail.com',
				'password' => 'd033e22ae348aeb5660fc2140aec35850c4da997',
				'confirmation_code' => '9116d32e0275c5ca05db83fdb79b81bb',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '331693689.jpg',
				'realname' => 'Administrador',
				'created_at' => '2014-05-19 12:03:29',
				'updated_at' => '2014-05-30 05:42:11',
			),
			1 => 
			array (
				'id' => 6,
				'username' => 'user',
				'email' => 'user@user.com',
				'password' => '$2y$10$ttfx1NOwVnaeUKs69MoaUO8KfPFsS4BJ5IBd4COKvAy3j48CpnJDa',
				'confirmation_code' => 'a45a9c3464b6f0a2e763ddcacf61ea71',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '',
				'realname' => 'user',
				'created_at' => '2014-06-01 02:37:44',
				'updated_at' => '2014-06-01 02:37:44',
			),
			2 => 
			array (
				'id' => 7,
				'username' => 'alberto',
				'email' => 'alberto@hotmail.com',
				'password' => '$2y$10$Nb5M5IYkMkEQhz.Rr0Ts5OXzqUwEAhd/iVMCHJzvXTMB3BN9s1IBa',
				'confirmation_code' => '37ad07a7cd43134cb742786080c23b3b',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '552656_322159441211798_511476645_n.jpg',
				'realname' => 'alberto',
				'created_at' => '2014-06-01 21:33:10',
				'updated_at' => '2014-06-01 21:45:36',
			),
			3 => 
			array (
				'id' => 8,
				'username' => 'Rodrigo',
				'email' => 'rodrigo@hotmail.com',
				'password' => '$2y$10$Bw8GKO7.9gp/L1/flcFBTe1wuWV6a7EtMEWyhkhS2liUDYo.J/eha',
				'confirmation_code' => 'e35b7b249f093fe17959321eb0c50f48',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '',
				'realname' => 'Rodrigo',
				'created_at' => '2014-06-01 21:33:45',
				'updated_at' => '2014-06-01 21:33:45',
			),
			4 => 
			array (
				'id' => 9,
				'username' => 'roxana',
				'email' => 'a@a.com',
				'password' => '$2y$10$BsdUnNvGEc9YaSAIlbJxju8D3Zacqsm8uBGX1pqdWqdCEZoMy9A3K',
				'confirmation_code' => 'fa58b554f513527a3c9996278e7128a1',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '',
				'realname' => 'roxana',
				'created_at' => '2014-06-01 21:34:28',
				'updated_at' => '2014-06-01 21:34:28',
			),
			5 => 
			array (
				'id' => 10,
				'username' => 'franco',
				'email' => 'b@b.com',
				'password' => '$2y$10$GY5s6CFEuCXJT49VsEj/A.hfEiEbB9UlWxsb6iKEFPcGgnqVvMfYG',
				'confirmation_code' => 'ad42bd3c06edb6ae575eec92f82d3ba2',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '',
				'realname' => 'franco',
				'created_at' => '2014-06-01 21:34:51',
				'updated_at' => '2014-06-01 21:34:51',
			),
			6 => 
			array (
				'id' => 11,
				'username' => 'julieta',
				'email' => 'c@c.com',
				'password' => '$2y$10$bYDEUMIMXHrWW5DEp1Qg9eEkAOxzdheIuBLY.ExkhdPzjFsPv/lBK',
				'confirmation_code' => 'dbcb12ba04b9061c4a75be74ce00f11c',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => 'rebelde.jpg',
				'realname' => 'julieta',
				'created_at' => '2014-06-01 21:35:17',
				'updated_at' => '2014-06-01 21:39:29',
			),
			7 => 
			array (
				'id' => 12,
				'username' => 'vanesa',
				'email' => 'd@d.com',
				'password' => '$2y$10$psKXKLp/fnV3MFcYKfEDOOdViG7raZG0Gqa9OJEn0eZBKdbA1pjP.',
				'confirmation_code' => '569841199b854d417daf3f4a271e2418',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '10258435_643177329085308_4141061417262044690_n.jpg',
				'realname' => 'vanesa',
				'created_at' => '2014-06-01 21:35:42',
				'updated_at' => '2014-06-01 21:46:24',
			),
			8 => 
			array (
				'id' => 13,
				'username' => 'pablo',
				'email' => 'p@p.com',
				'password' => '$2y$10$EMOTnkXdvP0AT118yvU/RuEgiGhrFs3ZYI9LWrefu8a5Dosq7KTtm',
				'confirmation_code' => '34993c4d62b42e1331325db4ccdadcee',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '',
				'realname' => 'pablo',
				'created_at' => '2014-06-01 21:36:11',
				'updated_at' => '2014-06-01 21:36:11',
			),
			9 => 
			array (
				'id' => 14,
				'username' => 'seba',
				'email' => 's@s.com',
				'password' => '$2y$10$x8SyudJ02bfvvzC2l6mXe.pqF280rtNdTSble6CFidPfCCvbTivgi',
				'confirmation_code' => '1eda04f592b4495603dfb900ebe68c3c',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '10269344_772819426061775_8395019513049986186_n.jpg',
				'realname' => 'seba',
				'created_at' => '2014-06-01 21:36:34',
				'updated_at' => '2014-06-01 21:44:58',
			),
			10 => 
			array (
				'id' => 15,
				'username' => 'anita',
				'email' => 'an@an.com',
				'password' => '$2y$10$CRRi13FYZ/nqNynkBJTumencRnR9HmVvvrfVrDAeG3o1kAe7kCYO6',
				'confirmation_code' => '89cdb4a00b59287d8f9f1f216391cc77',
				'remember_token' => NULL,
				'confirmed' => 1,
				'photo' => '',
				'realname' => 'anita',
				'created_at' => '2014-06-01 21:50:26',
				'updated_at' => '2014-06-01 21:50:26',
			),
		));
	}

}
