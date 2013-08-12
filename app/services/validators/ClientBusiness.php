<?php namespace Services\Validators;


/**
* 	
*/
class ClientBusiness extends Validator {
	
	public static $rules = array(

		'username'                 => 'alpha_num|unique:users|required|min:6',
		'password'                 => 'required|confirmed|min:6',
		'lastname'                 => 'required',
		'firstname'                => 'required',
		'image'                    => 'required|image|max:5000',
		'email'                    => 'email|required|unique:clients',
		'company_name'             => 'required',
		'company_address'          => 'required',
		'contact_no'               => 'required',
		'security_question_answer' => 'required'

	);

}

