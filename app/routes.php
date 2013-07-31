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



Route::filter('auth', function() {
 if (Auth::guest()) return Redirect::to('admin/login');
});

Route::get('admin/login', function() {
 return View::make('layouts.back.login');
});

Route::post('admin/login', function(){
	 // get POST data
	$userdata = ['username' => Input::get('username'),'password' => Input::get('password'), 'is_client' => false, 'is_active' => true];

 	if ( Auth::attempt($userdata) ) {
 		User::find(Auth::user()->id)->update(['last_logged_in' => new DateTime]);
		return Redirect::intended('admin');
 	}
 	return Redirect::to('admin/login')->with('login_errors', true);
});

// Administrator Pages

Route::group(array('before' => 'auth'), function () {

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

	Route::get('admin', 'Admin@index');
	
	Route::get('/logout', function() {
		Auth::logout();
		return Redirect::to('/');
	});

});

// end Administrator Group -------------------------------------




// Client - Dashboard
// -------------------------------------------------------------
Route::get('/', function() {
	return View::make('hello');
});

