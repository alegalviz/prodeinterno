<?php

class Apuesta extends Eloquent {

    protected $table = 'apuestas';

	/**
	 * Borra una apuesta realizada
	 *
	 * @return bool
	 */
	public function delete()
	{
		// Borrar la apuesta
		return parent::delete();
	}

	/**
	 * Get el usuario de la apuesta.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

    /**
     * Get el equipo 1 de la apuesta.
     *
     * @return User
     */
    public function partido()
    {
        return $this->belongsTo('Partido', 'partido_id');
    }

    /**
     * Get la fecha que se hizo la apuesta.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	/**
	 * Retorna la fecha de creación de la apuesta
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Retorna la fecha de la última actualización de la apuesta
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}
    /**
     * Retorna la fecha de la última actualización de la apuesta
     *
     * @return string
     */
    public static function apuestaPartidoUsuario($partido)
    {
        $idApuesta = Apuesta::where('partido_id', '=', $partido)->where('user_id', '=', Auth::user()->id)->get(array('id'));

        return $idApuesta;
    }

}
