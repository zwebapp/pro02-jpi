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
		return View::make('admin.categories.main');

	}

	public function add()	{
		return View::make('admin.categories._form');
	}

	public function edit($id)	{
		
		$category = Category::find($id);
		return View::make('admin.categories._form', array_merge($category->toArray(), ["edit" => true] ));

	}

	public function save() {
		
		$validation = new Services\Validators\Category;

		if ($validation->fails()) {

			// return Request::ajax() ? 
			// 			Response::json(['success' => false, 'errors' => $validation->errors->all()]) : 
			// 			Redirect::back()->withInput()->withErrors($validation->errors);
			return Redirect::action('Categories@add')->withInput()->withErrors($validation->errors);
		}

		// Create a new category then. . . 	
		Category::create(Input::all());

		Session::flash('save', true);
		
		return Redirect::action('Categories@add');
	}

	public function update()
	{
		$validation = new Services\Validators\Category;

		if ($validation->fails()) {
			return Redirect::action('Categories@edit', ['id' => Input::get('id')])->withInput()->withErrors($validation->errors);
		}

		$category = Category::find(Input::get('id'));

		$category->name = Input::get('name');
		$category->description = Input::get('description');

		$category->save();

		Session::flash('update', true);

		return Redirect::action('Categories@edit', ['id' => Input::get('id')])->withInput();

	}

	public function remove() {
		
		$category = Category::find(Input::get('id'));

		$category->delete();

	}



}