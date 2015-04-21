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

Route::get('/auth/login',function(){
    return view('auth.login');
});

Route::group(
    [
    //    'middleware' => 'App\Http\Middleware\Authenticate'
    ]
    ,function(){

    Route::get('/admin', 'Admin\AdminController@index');
    Route::get('/admin/dashboard', 'Admin\AdminController@dashboard');
    Route::get('/admin/faculty', 'Admin\FacultyAdminController@index');
    Route::get('/admin/user','Admin\UserAdminController@index');
    Route::get('/admin/role','Admin\AdminController@role');
    Route::get('/admin/project','Admin\AdminController@project');

});



Route::group(['prefix' => 'api'], function()
{
    Route::resource('faculty','API\FacultyApiController');
    Route::resource('faculty.logo', 'API\FacultyLogoApiController');

    Route::resource('user','API\UserApiController');
    Route::resource('user.logo','API\UserLogoApiController');
    Route::resource('user-type','API\UserTypeApiController');

    Route::resource('project','API\ProjectApiController');


    Route::post('auth/login','API\AuthApiController@authenticate');
    Route::post('auth/logout','API\AuthApiController@unAuthenticate');

});

Route::get('/img/{path}',function(League\Glide\Server $server,\Illuminate\Http\Request $request){
    $server->outputImage($request);
})->where('path','.*');

use \Auth;
Route::get('test',function(){
    $user = \App\Models\User::find(70);
    Auth::attempt(['email'=>'chaow.po@up.ac.th','password'=>'3arfurzf']);
    return Auth::user();
});

Route::get('test2',function(){
    Auth::logout();
});