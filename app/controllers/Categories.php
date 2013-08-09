<?php 


class Categories extends BaseController {


	public function index() {
	
		// Show the categories page
		return View::make('admin.categories.main');

	}




	public function add()	{
		return View::make('admin.categories._form');
	}




	public function edit($id)	{
		
		$category = Category::find($id);
		return View::make('admin.categories._form', array_merge($category->toArray(), array("edit" => true) ));

	}




	public function save() {
		
		$validation = new Services\Validators\Category;

		if ($validation->fails()) {
			return Redirect::action('Categories@add')->withInput()->withErrors($validation->errors);
		}

		// Create a new category then. . . 	
		Category::create(Input::all());

		Notification::success('<strong>Yes!</strong> New category added! <small> Wanna add more? </small>');
		
		return Redirect::action('Categories@add');
	}





	public function update()
	{
		$validation = new Services\Validators\Category;

		if ($validation->fails()) {
			return Redirect::action('Categories@edit', array('id' => Input::get('id')))->withInput()->withErrors($validation->errors);
		}

		$category              = Category::find(Input::get('id'));
		$category->name        = Input::get('name');
		$category->description = Input::get('description');

		$category->save();

		$category->push();
		
		Notification::success('<strong>Dang!</strong> Product updated!');

		return Redirect::action('Categories@edit', array('id' => Input::get('id')))->withInput();

	}




	public function remove() {
		
		$category = Category::find(Input::get('id'));

		$category->delete();

	}



}