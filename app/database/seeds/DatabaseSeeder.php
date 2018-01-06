<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        // Add calls to Seeders here
        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('RolesTableSeeder');
        $this->call('PermissionsTableSeeder');
        $this->call('EstadiosTableSeeder');
        $this->call('GruposTableSeeder');
        $this->call('EquiposTableSeeder');
        $this->call('PartidosTableSeeder');
        $this->call('ApuestasTableSeeder');
        $this->call('ResultadosTableSeeder');
        $this->call('ClasificadosTableSeeder');
        $this->call('UserPictureTableSeeder');
    	$this->call('ProdesTableSeeder');
        $this->call('PuntajesTableSeeder');
        $this->call('MiembrosTableSeeder');
		$this->call('LikesTableSeeder');
		$this->call('AssignedRolesTableSeeder');
	}

}