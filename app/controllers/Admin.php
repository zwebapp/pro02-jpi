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



	public function manage()
	{
		return View::make('admin.manage.main');
	}


	public function updateSettings() {
		
		$setting = Setting::first();

		if (Input::has('recipients')) {
			$setting->recipients = Input::get('recipients');
		}

		$setting->save();

		Notification::success('<strong> Success!</strong> Your settings has been saved!');

		return Redirect::action('Admin@manage');
	}



	public function add()
	{
		return View::make('admin.manage._form');
	}

	public function edit($id)
	{
		$admin = User::find($id)->administrator;

		return View::make('admin.manage._form', array_merge($admin->toArray(), array("edit" => true) ));
	}

	public function save()
	{

		$validation = new Services\Validators\AdminAccount;

		if ($validation->fails()) {
			return Redirect::action('Admin@add')->withInput()->withErrors($validation->errors);
		}

		$inputs = Input::all();
		$inputs['password'] = Hash::make($inputs['password']);

		$admin = new Administrator(array('name' => $inputs['name'] ));

		$user = User::create($inputs);

		$admin = $user->administrator()->save($admin);

		Notification::success('<strong>Yes!</strong> New administrator added! <small> Wanna add more? </small>');

		return Redirect::action('Admin@add');

	}

	public function update()
	{
		$validation = new Services\Validators\AdminAccount(array(Input::get('name'), Input::get('username'), Input::get('is_active')));

		if ($validation->fails()) {
			return Redirect::action('Admin@edit', array('id' => Input::get('id')))->withInput()->withErrors($validation->errors);
		}

		$inputs = Input::all();

		$user = User::find($inputs['id']);
		$user->username = $inputs['username'];
		$user->password = $inputs['password'];
		$user->is_active = $inputs['is_acitve'];
		$user->administrator->name = $inputs['name'];

		$user->save();
		$admin->push();
		
		Notification::success('<strong>Dang!</strong> Administrator account updated!');

		return Redirect::action('Admin@edit', array('id' => Input::get('id')));

	}

}