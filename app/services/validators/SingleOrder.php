<?php namespace Services\Validators;


/**
* 	
*/
class SingleOrder extends Validator {
	
	public static $rules = array(

		'quantity' => 'integer|required'

	);

}

