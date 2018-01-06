<?php

class Clasificado extends \Eloquent {

    protected $table = 'clasificados';
    public function equipo()
    {
        return $this->belongsTo('Equipo');
    }
}