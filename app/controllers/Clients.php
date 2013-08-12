<?php 


class Clients extends BaseController {


	public function index() {
	
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


	public function clientRegister()
	{
		return View::make('client.clients.register');
	}

	public function clientSubmit()
	{
		$userType = Input::get('lookup_user_type');

		$validation =  6 == $userType ? new Services\Validators\ClientSidePersonal : new Services\Validators\ClientSideBusiness;

		if ($validation->fails()) {
			return Redirect::back()->withInput()->withErrors($validation->errors);
		}

		$inputs = Input::all();

		$inputs['password'] = Hash::make($inputs['password']);
		$inputs['is_client'] = TRUE;

		$user = User::create($inputs);

		$client = new Client($inputs);

		if (Input::hasFile('image')) {
			$image = new Services\Uploaders\Image;
			$image->setPath(public_path() . '\uploads\images\clients\\', 'public/uploads/images/clients/');

			$client->image = $image->save();
		}

		$client = $user->client()->save($client);

 		$hash = preg_replace('#/+#', '', Hash::make( date_format($client->created_at, 'Y-m-d H:i:s')));

		$data = array('username' => $user->username, 'link' => Redirect::action('Clients@verify', array($hash, $client->id)));

		Mail::send('emails.finalize-registration', $data, function($message) use($client)
		{
		    $message->to($client->email, $client->firstname . ' ' . $client->lastname )->subject('Welcome!');
		});

		return Redirect::action('Clients@finalizeRegistration');

	}


	public function finalizeRegistration()
	{
		return View::make('client.clients.finalize');
	}

	public function verify($hash, $id)
	{
		$client = Client::findOrFail($id);
		
		$hashed = preg_replace('#/+#', '', Hash::make( date_format($client->created_at, 'Y-m-d H:i:s')));

		if (! Hash::check($hashed, $hash)) {
			return "Unverified.";
		}

		$client->is_verified = true;
		$client->save();
		
		return View::make('client.clients.confirmed');

	}


	public function changePassword()
	{

		$client = Client::where('email', Input::get('email'))->firstOrFail();

		if ($client->count() == 0) {
			Notification::error('Email not found');
			return Redirect::back()->withInput();
		}

		$newpass = strval(mt_rand(100000,999999));

		// dd($client);

		$client->user->password = Hash::make($newpass);
		$client->user->save();

		Mail::send('emails.password-reset', array('newpass' => $newpass), function($message) use ($client)
		{
		    $message->to($client->email, $client->firstname . ' ' . $client->lastname )->subject('Password Reset');
		});

		return View::make('client.reset-password-confirmation');


	}

}