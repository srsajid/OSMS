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

Route::get('/',function(){
    return Redirect::to("/login");
});

Route::get("login", array('as' => 'login', function(){
    return View::make("admin.login");
}))->before("guest");

Route::post("login", "AccountController@login");
Route::get("logout", "AccountController@logout");
Route::get("/admin", array('as' => 'admin', 'uses' => "AccountController@admin"))->before("auth");

Route::get("/admission", "AdmissionController@loadTable");
Route::get("/admission/create", "AdmissionController@create");
Route::post("/admission/save", "AdmissionController@save");
Route::get("/admission/edit", "AdmissionController@edit");

Route::get("/category", "CategoryController@loadTable");
Route::get("/category/create", "CategoryController@create");
Route::get("/category/edit", "CategoryController@edit");
Route::post("/category/save", "CategoryController@save");

Route::get("/sells/loadTable", "SellsController@loadTable");
Route::get("/sells/create", "SellsController@create");
Route::post("/sells/save", "SellsController@save");
Route::get("/sells/selection", "SellsController@selection");

Route::get("/product/loadTable", "ProductController@loadTable");
Route::get("/product/create", "ProductController@create");
Route::get("/product/view", "ProductController@view");
Route::post("/product/save", "ProductController@save");
Route::get("/product/inventory", "ProductController@loadInventoryForm");
Route::post("/product/updateInventory", "ProductController@updateInventory");
Route::get("/product/selection", "ProductController@productForSelection");

Route::get("/package/loadTable", "PackageController@loadTable");
Route::get("/package/create", "PackageController@create");
Route::post("/package/save", "PackageController@save");
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

Route::get("test", function(){
   return Sell::find(1)->getTotal();
});


Route::get("upload/create", function(){
    return View::make("test");
});

Route::post("upload/save", function(){
    $student = Input::file('student');
    $father = Input::file('father');

    $destinationPath = public_path().'/uploads';
    $filename = $student->getClientOriginalName();
    $filename2 = $father->getClientOriginalName();
    $extension =$student->getClientOriginalExtension();
    $student_success = Input::file('student')->move($destinationPath, $filename);
    $father_success = Input::file('father')->move($destinationPath, $filename2);

    if( $student_success) {
        return array("status" => "success", "message" => "Upload successfully");
    } else {
        return Response::json('error', 400);
    }
});