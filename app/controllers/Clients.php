<?php 


class Clients extends BaseController {


	public function index(){
	
		return View::make('admin.clients.main', array( 'users' => User::where('is_client', TRUE)->paginate(10)));

	}


	public function addPersonal()
	{
		return View::make('admin.clients._form-personal');
	}

	public function addBusiness()
	{
		return View::make('admin.clients._form-business');
	}

	public function save()
	{
		$userType = Input::get('lookup_user_type');

		$validation =  6 == $userType ? new Services\Validators\ClientPersonal : new Services\Validators\ClientBusiness;

		if ($validation->fails()) {
			return Redirect::action( 6 == $userType ? 'Clients@addPersonal' : 'Clients@addBusiness' )->withInput()->withErrors($validation->errors);
		}

		$inputs = Input::all();

		$inputs['password'] = Hash::make($inputs['password']);

		$user = User::create($inputs);
		$client = new Client($inputs);

		$client = $user->client()->save($client);

		if (Input::hasFile('image')) {

			$image = new Services\Uploaders\Image;
			$image->setPath(public_path() . '\uploads\images\clients\\', 'public/uploads/images/clients/');

			$client->image = $image->save();
			$client->save();
		
		}

		Notification::success('<strong>Yes!</strong> New client added! <small> Wanna add more? </small>');
		
		return Redirect::action(  6 == $userType ? 'Clients@addPersonal' : 'Clients@addBusiness');

	}

	public function edit($id)
	{
		$user = User::find($id);

		Session::put('edit', true);

		return View::make( 6 == $user->client->lookup_user_type ? 'admin.clients._form-personal' : 'admin.clients._form-business', array('user' => $user) );

	}

	public function update()
	{
		$userType = Input::get('lookup_user_type');

		$validation = 6 == $userType ? new Services\Validators\ClientPersonal : new Services\Validators\ClientBusiness;

		if ($validation->fails()) {
			return Redirect::action( 6 == $userType ? 'Clients@addPersonal' : 'Clients@addBusiness' )->withInput()->withErrors($validation->errors);
		}

		$inputs = Input::all();

		$inputs['password'] = Hash::make($inputs['password']);

		$user = User::create($inputs);
		$client = new Client($inputs);

		$client = $user->client()->save($client);

		if (Input::hasFile('image')) {

			$image = new Services\Uploaders\Image;
			$image->setPath(public_path() . '\uploads\images\clients\\', 'public/uploads/images/clients/');

			$client->image = $image->save();
			$client->save();
		
		}

		Notification::success('<strong>Yes!</strong> New client added! <small> Wanna add more? </small>');
		
		return Redirect::action(  6 == Input::get('lookup_user_type') ? 'Clients@addPersonal' : 'Clients@addBusiness');

	}


}