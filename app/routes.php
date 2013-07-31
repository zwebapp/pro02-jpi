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


// Administrator - Categories Pages
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
// end Administrator -------------------------------------------


// Administrator - Product Pages
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

Route::get('admin', 'Dashboard@get_index');

Route::get('/', function() {
	return View::make('hello');
});
