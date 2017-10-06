<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');
 
<<<<<<< HEAD


=======
>>>>>>> bc94bb1234052093ebd30030f8debee196242cd8
Route::get('/category', 'HomeController@showCategory');
Route::get('/deletecategory/{id_category}', 'CategoryController@destroyCategory');
Route::get('/deletecourse/{id_course}', 'CourseController@destroyCourse');


Route::get('/lifepage', 'CategoryController@View');
Route::post('/create_category', 'CategoryController@create');
Route::post('/create_course', 'CourseController@create');
<<<<<<< HEAD
});
=======

});

>>>>>>> bc94bb1234052093ebd30030f8debee196242cd8
