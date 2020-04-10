<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=>['role:super-admin','auth']],function(){
	Route::resource('admin/permission', 'Admin\\PermissionController');
	Route::resource('admin/role', 'Admin\\RoleController');
	Route::resource('admin/user', 'Admin\\UserController');
});

Route::group(['middleware'=>['auth']],function(){
	Route::view('/admin','admin.dashboard');
	Route::get('admin/file/{userId}', 'Admin\\FileController@index');
	Route::get('/create', 'Admin\\FileController@create');
	Route::get('/show/{userId}', 'Admin\\FileController@show');
	Route::delete('/delete/{userId}', 'Admin\\FileController@destroy');
	Route::post('document_upload/{userId}', 'Admin\\FileController@document_upload');
});

Route::get('/home', 'HomeController@index')->name('home');


// Route::resource('admin/file/create', 'Admin\\FileController@create');
