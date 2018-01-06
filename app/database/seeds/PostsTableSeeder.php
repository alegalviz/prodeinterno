<?php

class PostsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		//\DB::table('posts')->truncate();
        
		\DB::table('posts')->insert(array (
			0 => 
			array (
				'id' => 4,
				'user_id' => 1,
				'title' => 'Bienvenidos',
				'slug' => '',
				'content' => 'Bienvenidos a Tu Prode Mundial.',
				'meta_title' => '',
				'meta_description' => '',
				'meta_keywords' => '',
				'created_at' => '2014-05-30 05:41:13',
				'updated_at' => '2014-05-30 11:47:56',
			),
		));
	}

}
