<?php namespace Services\Validators;


/**
* 	
*/
class ClientPersonal extends Validator {
	
	public static $rules = array(

		'username'                 => 'alpha_num|unique:users|required|min:6',
		'password'                 => 'required|confirmed|min:6',
		'lastname'                 => 'required',
		'firstname'                => 'required',
		'email'                    => 'email|required|unique:clients',
		'birthday'                 => 'required',
		'address'                  => 'required',
		'contact_no'               => 'required',
		'security_question_answer' => 'required'

	);

}

