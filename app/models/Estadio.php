<?php

class Estadio extends \Eloquent {

    protected $table = 'estadios';
    /**
     * Get equipos del grupo.
     *
     * @return Partido
     */
    public function partidos()
    {
        return $this->hasMany('Partido');
    }


}