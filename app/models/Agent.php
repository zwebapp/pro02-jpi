<?php

class Agent extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    protected $fillable   = [ 'information', 'is_active' ];

    protected $softDelete = true;
}