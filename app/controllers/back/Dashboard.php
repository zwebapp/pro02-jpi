<?php 


class Dashboard extends BaseController {


	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		
	}


	public function get_index(){
	
		return View::make('admin.dashboard');

	}

}