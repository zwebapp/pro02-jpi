<?php namespace Services\Validators;


/**
* 	
*/
class Product extends Validator {
	
	public static $rules = [

		'name'  => 'required',
		'image' => 'image|mimes:jpeg,bmp,png'

	];

}

