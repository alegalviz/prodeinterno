<?php

class Resultado extends \Eloquent {

    protected $table = 'resultados';
    protected $fillable = ['partido_id'];

    public function partido()
    {
        return $this->belongsTo('Partido');
    }

    public function ganador()
    {
        return $this->belongsTo('Equipo');
    }
}