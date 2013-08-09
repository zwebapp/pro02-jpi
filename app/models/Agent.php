<?php

class Agent extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    protected $fillable   = array( 'information', 'is_active' );

    protected $softDelete = true;
}