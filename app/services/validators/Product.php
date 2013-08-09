<?php namespace Services\Validators;


/**
* 	
*/
class Product extends Validator {
	
	public static $rules = array(

		'name'  => 'required',
		'description' => 'max:200',
		'image' => 'image|mimes:jpeg,bmp,png'

	);

}

