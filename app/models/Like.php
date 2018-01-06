<?php

class Like extends \Eloquent {
	protected $fillable = [];
    protected $table = 'likes';

    /**
     * Get likes del post.
     *
     * @return Likes
     */
    public function post()
    {
        return $this->belongsTo('Post');
    }
    /**
     * Get likes del user.
     *
     * @return Likes
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}