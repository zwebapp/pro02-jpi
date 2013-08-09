<?php

class Client extends Eloquent {

    public static $rules = array();

    protected $fillable = array('lastname', 'firstname', 'email','address','company_name','company_address','contact_no','birthday','image','lookup_user_type','lookup_security_question','security_question_answer','is_validated');

    public function user()
    {
    	return $this->belongsTo('User');
    }

   	public function userType()
   	{
   		return $this->belongsTo('Lookup', 'lookup_user_type');
   	}
}