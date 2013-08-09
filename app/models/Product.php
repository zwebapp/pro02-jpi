<?php

class Product extends Eloquent {
	
		protected $guarded    = array();
		
		public static $rules  = array();

		protected $fillable   = array( 'name', 'description', 'category_id'  );
		
		// Allowing soft delete
		protected $softDelete = true;


    public function category() {
    	
    	return $this->belongsTo('Category');

    }
}