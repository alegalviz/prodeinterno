<?php


class Partido extends \Eloquent {

    protected $table = 'partidos';

    /**
     * Get equipo local del partido.
     *
     * @return Equipo
     */
    public function equipolocal()
    {
        return $this->belongsTo('Equipo', 'equipo1_id');
    }
    /**
     * Get equipo vistante del partido.
     *
     * @return Equipo
     */
    public function equipovisitante()
    {
        return $this->belongsTo('Equipo', 'equipo2_id');
    }
    /**
     * Get estadio del partido.
     *
     * @return Equipo
     */
    public function estadio()
    {
        return $this->belongsTo('Estadio', 'estadio_id');
    }

    public function getDates()
    {
        return array('inicio');
    }

    /**
     * Get apuesta del partido.
     *
     * @return Equipo
     */
    public function apuestas()
    {
        return $this->hasMany('Apuesta');
    }

    public function apuestasUsuario()
    {
        return $this->hasMany('Apuesta')->where('user_id', '=', Auth::getUser()->getId());

    }

    /**
     * Get resultado del partido.
     *
     * @return Resultado
     */
    public function resultado()
    {
        return $this->hasOne('Resultado');
    }
}