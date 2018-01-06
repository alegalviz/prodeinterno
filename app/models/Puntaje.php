<?php


class Puntaje extends \Eloquent {

    protected $table = 'puntajes';
    protected $fillable = ['user_id'];
    /**
     * Get usuario del puntaje
     *
     * @return User
     */
    public function usuario()
    {
        return $this->belongsTo('User', 'user_id');
    }
}