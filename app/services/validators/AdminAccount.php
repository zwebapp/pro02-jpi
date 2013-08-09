<?php namespace Services\Validators;


/**
* 	
*/
class AdminAccount extends Validator {
	
	public static $rules = array(

		'username' => 'alpha_num|unique:users|required|min:6',
		'password' => 'required|confirmed|min:6',
		'name' => 'required'

	);

}

