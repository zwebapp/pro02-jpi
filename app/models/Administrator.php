<?php

class Administrator extends Eloquent {
	
    protected $guarded = array();

    public static $rules = array();

    protected $fillable = array( 'name', 'user_id' );

    public function user()
    {
    	return $this->belongsTo('User');
    }
}