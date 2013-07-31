<?php 


class Admin extends BaseController {


	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		
	}


	public function index(){
	
		return View::make('admin.dashboard');

	}

}