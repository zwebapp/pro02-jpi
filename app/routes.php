<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::filter('adminAuth', function() {
 if (Auth::guest() || Auth::user()->is_client == TRUE) return Redirect::to('admin/login');
});

Route::get('admin/login', function() {
 return View::make('layouts.back.login');
});

Route::post('admin/login', function(){
	 // get POST data
	$userdata = array('username' => Input::get('username'),'password' => Input::get('password'), 'is_client' => false, 'is_active' => true);

 	if ( Auth::attempt($userdata) ) {
 		$user = User::find(Auth::user()->id);
 		$user->last_logged_in =  new DateTime;
 		$user->save();

		return Redirect::intended('admin');
 	}

 	return Redirect::to('admin/login')->with('login_errors', true);
});

Route::get('/logout', function() {
	Auth::logout();
	Session::flush();
	return Redirect::to('/');
});

// Administrator Pages

Route::group(array('before' => 'adminAuth'), function () {

// Categories Pages
// -------------------------------------------------------------
	Route::model('category', 'Category');
	Route::get('admin/categories/{category}/remove', function(Category $category){
	$category->delete();
});
	Route::get('admin/categories/{id}/edit','Categories@edit' );
	Route::get('admin/categories/update', 'Categories@update');
	Route::get('admin/categories/save', 'Categories@save' );
	Route::get('admin/categories/add', 'Categories@add' );
	Route::get('admin/categories', 'Categories@index');
// end Categories Pages -------------------------------------------


// Product Pages
// -------------------------------------------------------------
	Route::model('product', 'Product');
	Route::get('admin/products/{product}/remove', function(Product $category){
		$category->delete();
	});
	Route::get('admin/products/{id}/edit','Products@edit' );
	Route::get('admin/products/{id}/show','Products@show' );
	Route::get('admin/products/state', 'Products@state');
	Route::post('admin/products/update', 'Products@update');
	Route::post('admin/products/save', 'Products@save' );
	Route::get('admin/products/add', 'Products@add' );
	Route::get('admin/products', 'Products@index');
// end Product Pages -------------------------------------------
 

// Agents Pages
// -------------------------------------------------------------
	Route::model('agent', 'Agent');
	Route::get('admin/agents/{agent}/remove', function(Agent $agent){
		$agent->delete();
	});
	Route::get('admin/agents/{id}/edit','Agents@edit' );
	Route::get('admin/agents/state', 'Agents@state');
	Route::get('admin/agents/update', 'Agents@update');
	Route::get('admin/agents/save', 'Agents@save' );
	Route::get('admin/agents/add', 'Agents@add' );
	Route::get('admin/agents', 'Agents@index');

// end Agents Pages -------------------------------------------


// Clients Pages
// -------------------------------------------------------------
	Route::model('user', 'User');
	Route::get('admin/clients/{user}/remove', function(User $user){
		$user->delete();
	});
	Route::get('admin/clients/{id}/edit','Clients@edit' );
	Route::get('admin/clients/addPersonal', 'Clients@addPersonal');
	Route::get('admin/clients/addBusiness', 'Clients@addBusiness');
	Route::get('admin/clients/update', 'Clients@update');
	Route::post('admin/clients/save', 'Clients@save');
	Route::get('admin/clients', 'Clients@index');

// end Agents Pages -------------------------------------------
// 

// Orders Pages
// -------------------------------------------------------------
	
	Route::get('admin/orders/sort/{sort}', 'Orders@showSort');
	Route::get('admin/orders/{id}/show','Orders@show' );
	Route::get('admin/orders/update', 'Orders@update');
	Route::get('admin/orders', 'Orders@index');

// end Agents Pages -------------------------------------------







// Manage Pages
// -------------------------------------------------------------
	Route::model('user', 'User');
	Route::get('admin/manage/accounts/{user}/remove', function(User $user){
		$user->delete();
	});
	Route::get('admin', 'Admin@index');
	Route::get('admin/manage', 'Admin@manage');
	Route::get('admin/manage/accounts/{id}/edit', 'Admin@edit');
	Route::post('admin/manage/updateSettings', 'Admin@updateSettings');
	Route::post('admin/manage/update', 'Admin@update');
	Route::post('admin/manage/save', 'Admin@save' );
	Route::get('admin/manage/add', 'Admin@add');
	
});

// end Administrator Group -------------------------------------


Route::filter('clientAuth', function() {
 if (Auth::guest()) return Redirect::back();
});


Route::post('client/login', function(){
	 // get POST data
	$userdata = array('username' => Input::get('username'),'password' => Input::get('password'), 'is_client' => true, 'is_active' => true);

 	if ( Auth::attempt($userdata) ) {
 		$user = User::find(Auth::user()->id);

 		if (! Auth::user()->client->is_verified) {
 			Auth::logout();
 			return Redirect::back()->with('login_errors', true);
 		}

 		$user->last_logged_in =  new DateTime;
 		$user->save();

		return Redirect::back();
 	}

 	return Redirect::back()->with('login_errors', true);
});

// Client - Dashboard
// -------------------------------------------------------------
Route::get('/', function() {
	return View::make('client.index');
});

Route::model('category', 'Category');

Route::get('products', 'Products@clientIndex');

Route::get('products/category/{id}', 'Products@clientShowCategory');
Route::get('products/{id}', 'Products@clientShowProduct');

Route::post('orders/additemtobasket', 'Orders@addItemToBasket');
Route::get('order/checkout', 'Orders@proceedCheckout');
Route::get('order/remove{id}', 'Orders@removeItem');
Route::post('order/submit', 'Orders@submit');


Route::get('register', 'Clients@clientRegister');
Route::post('register/submit', 'Clients@clientSubmit');
Route::get('register/finalize', 'Clients@finalizeRegistration');
Route::post('register/verify/{hash}/{id}', 'Clients@verify');

Route::get('forgot-password', function(){
	return View::make('client.forgotpassword');
});
Route::post('password-reset', 'Clients@changePassword');