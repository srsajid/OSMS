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

Route::get("/admin", function(){
    return View::make("admin.cms");
});

Route::get("/category", "CategoryController@loadTable");
Route::get("/category/create", "CategoryController@create");
Route::post("/category/save", "CategoryController@save");

Route::get("/product/loadTable", "ProductController@loadTable");
Route::get("/product/create", "ProductController@create");
Route::post("/product/save", "ProductController@save");
Route::post("/product/inventory", "ProductController@loadInventoryForm");

Route::get("test", function() {

    return ProductService::HelloWorld();
});
