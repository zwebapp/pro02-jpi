<?php

class Client extends Eloquent {

    public static $rules = array();

    // protected $guarded = ['id' ,'user_id'];

    protected $fillable = ['lastname', 'firstname', 'email','address','company_name','company_address','contact_no','birthday','image','lookup_user_type','lookup_security_question','security_question_answer','is_validated'];


    public function user()
    {
    	return $this->belongsTo('User');
    }

   	public function userType()
   	{
   		return $this->belongsTo('lookup', 'lookup_user_type');
   	}
}