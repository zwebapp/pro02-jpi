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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('admin', 'Dashboard@get_index');

// Administrator - Categories Pages
Route::model('category', 'Category');
Route::get('admin/categories', 'Categories@index');
Route::get('admin/categories/add', 'Categories@add' );
Route::get('admin/categories/save', 'Categories@save' );

// Update an item based on the given id
Route::get('admin/categories/{id}/edit','Categories@edit' );
Route::get('admin/categories/update', 'Categories@update');

// Remove an item based on the given category
Route::get('admin/categories/{category}/remove', function(Category $category){
	$category->delete();
});
