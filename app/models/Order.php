<?php

class Order extends Eloquent {
	
    protected $guarded = array();

    public static $rules = array();

    protected $fillable = array( 'client_id', 'lookup_status', 'products', 'delivery_address' );

    public function client()
    {
    	return $this->belongsTo('Client');
    }

    public function approvedBy()
    {
    	return $this->belongsTo('Administrator', 'approved_by');
    }

    public function agent()
    {
    	return $this->belongsTo('Agent', 'agent_id');
    }

    public function status()
    {
        return $this->belongsTo('Lookup', 'lookup_status');
    }

}