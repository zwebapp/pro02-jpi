<?php 


class Agents extends BaseController {


	public function index() {
	
		// Show the categories page
		return View::make('admin.agents.main', ['agents' => Agent::paginate(10)]);

	}




	public function add()	{
		return View::make('admin.agents._form');
	}




	public function edit($id)	{
		
		$agent = Agent::find($id);
		return View::make('admin.agents._form', array_merge($agent->toArray(), ["edit" => true] ));

	}




	public function save() {
		
	
		$formData = [
			'full_name' => Input::get('full_name'),
			'email_address' => Input::get('email_address'),
			'address' => Input::get('address'),
			'birthday' => Input::get('birthday'),
			'contact_no' => Input::get('contact_no'),
		];

		$agent = [ 'information' => json_encode($formData) ];

		Agent::create($agent);

		Notification::success('<strong>Yes!</strong> New agent added! <small> Wanna add more? </small>');
		
		return Redirect::action('Agents@add');
	}





	public function update()
	{
		// $validation = new Services\Validators\Category;

		// if ($validation->fails()) {
		// 	return Redirect::action('Categories@edit', ['id' => Input::get('id')])->withInput()->withErrors($validation->errors);
		// }

		$formData = [
			'full_name'     => Input::get('full_name'),
			'email_address' => Input::get('email_address'),
			'address'       => Input::get('address'),
			'birthday'      => Input::get('birthday'),
			'contact_no'    => Input::get('contact_no'),
		];

		$agent    = Agent::find(Input::get('id'));

		$agent->information =  json_encode($formData);
		$agent->is_active   =  filter_var(Input::get('is_active'), FILTER_VALIDATE_BOOLEAN);

		$agent->save();
		
		Notification::success('<strong>Dang!</strong> Agent updated!');

		return Redirect::action('Agents@edit', ['id' => Input::get('id')])->withInput();

	}




	public function remove() {
		
		$agent = Agent::find(Input::get('id'));

		$agent->delete();

	}



}