<?php

class Category extends Eloquent {


	// Instance declarations
	// 		
    protected $fillable   = array( 'name', 'description' );
    
    protected $guarded    = array();
    
    // Allowing soft delete
    protected $softDelete = true;
    
    public static $rules  = array();



    // Relationship constraints
    // 
    public function products() {
    	
    	return $this->hasMany('Product');

    }

    public function delete()
    {
        Product::where("category_id", $this->id)->update(array('category_id' => NULL));
        return parent::delete();
    }

}