<?php

class Grupo extends \Eloquent {

    protected $table = 'grupos';
    /**
     * Get equipos del grupo.
     *
     * @return User
     */
    public function equipos()
    {
        return $this->hasMany('Equipo');
    }
}