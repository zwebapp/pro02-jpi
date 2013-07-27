<?php 


class Categories extends BaseController {


	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		
	}


	public function index() {
	
		// Show the categories page
		return View::make('admin.categories');

	}


	public function add() {
		
		$validation = new Services\Validators\Category;

		if ($validation->fails()) {

			return Request::ajax() ? 
						Response::json(['success' => false, 'errors' => $validation->errors]) : 
						Redirect::back()->withInput()->withErrors($validation->errors);
		}

		// Create a new category then. . . 
		Category::create(Input::all());

		return Request::ajax() ?
			 		Response::json(['sucess' => true]) :
			 		Redirect::action('Categories@index');

	}

}