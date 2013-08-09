<?php

class Lookup extends Eloquent {
	
		protected $guarded    = array();
		
		public static $rules  = array();


		public function type()
		{
			return $this->belongsTo('LookupType');
		}

		public static function orderStatuses()
		{
			return LookupType::find(1)->lookups();
		}

		public static function userTypes()
		{
			return LookupType::find(2)->lookups;
		}

		public static function securityQuestions()
		{
			return LookupType::find(3)->lookups;
		}

}