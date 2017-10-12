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
 Route::auth();
Route::group(['middleware' => 'web'], function () {
   
    Route::get('/admin', 'HomeController@index');
 
Route::get('/category', 'HomeController@showCategory');
Route::get('/deletecategory/{id_category}', 'CategoryController@destroyCategory');

Route::get('/deletecourse/{id_course}', 'CourseController@destroyCourse');
Route::post('/edituser/{id_user}', 'HomeController@edituser');


Route::get('/lifepage', 'CategoryController@View');
Route::post('/create_category', 'CategoryController@create');
Route::post('/create_course', 'CourseController@create');
Route::post('/create_jobs', 'JobsController@store');

Route::get('/show_jobs', 'JobsController@index');
Route::get('/show_studies', 'studyController@index');
Route::get('/deletejob/{id_job}', 'JobsController@destroy');
Route::get('/deletestudies/{id_studies}', 'studyController@destroy');

Route::post('/create_studies', 'studyController@create');

Route::get('/pdf','CategoryController@invoice');
});


