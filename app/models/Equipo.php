<?php

class Equipo extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];
    protected $table = 'equipos';

    public function allPartidos()
    {
        return $this->hasMany('Partido', 'equipo1_id')->orWhere('equipo2_id', $this->id);
    }

    public function grupo()
    {
        return $this->belongsTo('Grupo');
    }

}