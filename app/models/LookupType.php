<?php

class LookupType extends Eloquent {
	
		protected $guarded    = array();
		
		public static $rules  = array();

		public function lookups()
		{
			return $this->hasMany('Lookup');
		}

}