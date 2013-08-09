<?php 


class Products extends BaseController {


	// Show the products page
	public function index() {
		return View::make('admin.products.main', array('products' => Product::orderBy('name')->paginate(10)));
	}


	public function show($id){
		$product = Product::find($id);
		return View::make('admin.products.show', array('product' => $product));
	}


	public function add()	{
		return View::make('admin.products._form');
	}





	public function edit($id)	{
		$product = Product::find($id);
		return View::make('admin.products._form', array_merge($product->toArray(), array("edit" => true) ));
	}


	public function save() {
		
		$validation = new Services\Validators\Product;		

		if ($validation->fails())

			return Redirect::action('Products@add')->withInput()->withErrors($validation->errors);

		$inputs = Input::all();

		$inputs['category_id'] = empty($inputs['category_id']) ? NULL : $inputs['category_id'];

		// Create a new category then. . . 	
		$product = Product::create($inputs);
		 
		if (Input::hasFile('image')) {

			$image = new Services\Uploaders\Image;
			$image->setPath(public_path() . '\uploads\images\products\\', 'public/uploads/images/products/');

			$product->image = $image->save();
			$product->save();
		
		}

		Notification::success('<strong>Yes!</strong> New product added! <small> Wanna add more? </small>');
		
		if (Request::ajax()) {
		}
		
		return Redirect::action('Products@add');
		//return Redirect::action('Products@index');
	}




	public function state() {
		$product = Product::find(Input::get('id'));
		$product->is_active = filter_var(Input::get('is_active'), FILTER_VALIDATE_BOOLEAN);
		$product->save();
	}




	public function update() {

		$validation = new Services\Validators\Product;

		if ($validation->fails()) {
			return Redirect::action('Products@edit', array('id' => Input::get('id')))->withInput()->withErrors($validation->errors);
		}

		$inputs = Input::all();

		$inputs['category_id'] = empty($inputs['category_id']) ? NULL : $inputs['category_id'];
		
		$product = Product::find($inputs['id']);

		$product->name = $inputs['name'];
		$product->description = $inputs['description'];
		$product->category_id = $inputs['category_id'];

		if (Input::hasFile('image')) {

			$image = new Services\Uploaders\Image;
			$image->setPath(public_path() . '\uploads\images\products\\', 'public/uploads/images/products/');

			$product->image = $image->save();

		}

		$product->save();

		Notification::success('<strong>Dang!</strong> Product updated!');

		
		if (Request::ajax()) {
		}
		return Redirect::action('Products@edit', array('id' => Input::get('id')))->withInput();
		
		// return Redirect::action('Products@index');

	}


	public function clientIndex()
	{
			return View::make('client.products.main', array('products' => Product::where('is_active', TRUE)->orderBy('name')->paginate(15)));
	}

	public function clientShowCategory($id)
	{
		if (is_null($id)) {
			return Redirect::action('Product@clientIndex');
		}

		return View::make('client.products.main', array('products' => Product::where('category_id', $id)->orderBy('name')->paginate(15), 'category' => Category::find($id) ));
	}

	public function clientShowProduct($id)
	{
		return View::make('client.products.single', array('product' => Product::find($id) ));
	}
}