<?php

class Administrator extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    public function user()
    {
    	$this->belongsTo('User');
    }
}