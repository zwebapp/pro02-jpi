<?php

class Category extends Eloquent {


		// Instance declarations
		// 
		protected $fillable = array( 'name', 'description' );

    protected $guarded = array();

    public static $rules = array();



    // Relationship constraints
    // 
    public function products() {
    	
    	return $this->hasMany('product');

    }



    // Public actions
    // 
    public function FunctionName($value='')
    {
    	# code...
    }
}