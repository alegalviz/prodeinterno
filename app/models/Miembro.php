<?php


class Miembro extends \Eloquent {

    protected $table = 'miembros';

    /**
     * Get usuarios del equipo
     *
     * @return User
     */
    public function equipousuario()
    {
        return $this->belongsTo('User', 'user_id');
    }

}