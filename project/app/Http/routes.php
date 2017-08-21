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
    return redirect('list');
});

Route::get('list', 'ListController@index');

Route::get('list/all', 'AllController@index');
Route::get('list/lai', 'LaiController@index');

// Route::get('/', function () {
//     return redirect('master');
// });

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// User Profile
Route::resource('userprofile', 'UserProfileController');

// Userlist
Route::resource('admin/userlist',"UserListController");

// Admin
Route::post('admin/changeStatus', 'UserListController@changeStatus');
Route::post('admin/changeRole', 'UserListController@changeRole');
Route::post('admin/deleteUser', 'UserListController@deleteUser');
Route::get('admin/searchuser', 'UserListController@searchUser');

Route::post('admin/filter','UserListController@filter');
Route::get('admin/filter','UserListController@filter');

// Change password
Route::get('changepassword','ChangePasswordController@index');
Route::post('changepassword','ChangePasswordController@store');

Route::get('/search','SearchController@search' );

Route::get('upload', 'UploadController@index');
Route::get('edit/{id}', 'UploadController@edit');
Route::post('edit/{id}/update', 'UploadController@update');

Route::post('/add','UploadController@store');

Route::get('list/view/{id}', 'ViewController@show');
Route::get('/view/{id}', 'ViewController@destroy');

Route::post('/comment/{id}', 'CommentController@store');
// Route::get('list/view/{id}', 'CommentController@show');