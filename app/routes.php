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

Route::get('/', function(){
    return View::make("admin.login");
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
Route::get("/product/inventory", "ProductController@loadInventoryForm");
Route::post("/product/updateInventory", "ProductController@updateInventory");

/*
 * Sign in with GET
 * */

Route::get('/sign-in',array(
        'as' => 'sign-in',
        'uses' => 'AccountController@getSignIn'
    )

);

/*
* Sign in with POST
* */

Route::post('/sign-in',array(
        'as' => 'sign-in-post',
        'uses' => 'AccountController@postSignIn'
    )

);

Route::get("test", function() {

    return CommonService::paginator(20, 40, 100);
});
