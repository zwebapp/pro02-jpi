<?php 


class Categories extends BaseController {


	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		
	}


	public function get_index() {
	
		// Show the categories page
		return View::make('admin.categories');

	}



	public function add() {
		
		$input = Input::get();

		$validator = Validator::make($input, array('name' => 'required'));

		// Fail early validation
		if ($validator->fails()) {

			if (Request::ajax()) 
				return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
			
			return Redirect::to('admin/categories')->withErrors($validator);			

		}

		// If passes the validation
		$category              = new Category;

		$category->name        = $input['name'];
		$category->description = $input['description'];

		$category->save();

		if (Request::ajax()) {
			return Response::json(['success' => true]);
		}

	}

}