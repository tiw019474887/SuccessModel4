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

Route::get('/', 'WelcomeController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/faculty', 'FacultyAdminController@index');
Route::get('/admin/user','UserAdminController@index');


Route::group(['prefix' => 'api'], function()
{
    Route::resource('faculty','FacultyController');
    Route::resource('faculty.logo', 'FacultyLogoController');

    Route::resource('user','UserController');
    Route::resource('user-type','UserTypeController');


});

Route::get('/img/{path}',function(League\Glide\Server $server,\Illuminate\Http\Request $request){
    $server->outputImage($request);
})->where('path','.*');
