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
\Blade::setContentTags('<%', '%>'); // for variables and all things Blade
\Blade::setEscapedContentTags('<%%', '%%>'); // for escaped data

Route::get('/', 'WelcomeController@index');

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'App\Http\Middleware\Authenticate']
    , function () {

        Route::get('/admin', 'Admin\AdminController@index');
        Route::get('/admin/dashboard', 'Admin\AdminController@dashboard');
        Route::get('/admin/faculty', 'Admin\FacultyAdminController@index');
        Route::get('/admin/user', 'Admin\UserAdminController@index');
        Route::get('/admin/role', 'Admin\AdminController@role');
        Route::get('/admin/project', 'Admin\AdminController@project');
        Route::get('/admin/project-status', 'Admin\AdminController@projectStatus');

    });
    Route::get('/researcher', 'Researcher\ResearcherController@index');



Route::group(['prefix' => 'api'], function () {

    Route::get('faculty/projects','API\FacultyProjectApiController@getProjects');
    Route::post('faculty/accept-project/{id}','API\FacultyProjectApiController@acceptProject');
    Route::post('faculty/rejectProject/{id}','API\FacultyProjectApiController@rejectProject');

    Route::get('university/projects','API\UniversityProjectApiController@getProjects');
    Route::post('university/accept-project/{id}','API\UniversityProjectApiController@acceptProject');
    Route::post('university/reject-project{id}','API\UniversityProjectApiController@rejectProject');

    Route::get('publish/projects','API\PublishProjectApiController@getProjects');

    Route::resource('faculty', 'API\FacultyApiController');
    Route::resource('faculty.logo', 'API\FacultyLogoApiController');

    Route::post('faculty/{id}/saveLogo','Api\"FacultyApiController@saveLogo');

    Route::resource('faculty.user', 'API\FacultyUserApiController');

    Route::resource('user', 'API\UserApiController');
    Route::post('user/search', 'API\UserApiController@search');

    Route::resource('user.logo', 'API\UserLogoApiController');
    Route::resource('role', 'API\RoleApiController');

    Route::resource('project-status', 'API\ProjectStatusApiController');
    Route::resource('project', 'API\ProjectApiController');
    Route::resource('project.member', 'API\ProjectMemberApiController');
    Route::resource('project.image', 'API\ProjectImageApiController');
    Route::resource('project.status','API\ProjectProjectStatusApiController');


    Route::get('researcher/projects','API\ResearcherProjectApiController@getProjects');
    Route::post('researcher/add-project','API\ResearcherProjectApiController@addProject');
    Route::post('researcher/submit-project/{id}','API\ResearcherProjectApiController@submitProject');


    Route::post('auth/login', 'API\AuthApiController@authenticate');
    Route::post('auth/logout', 'API\AuthApiController@unAuthenticate');
    Route::get('auth/user', 'API\AuthApiController@user');

    Route::get('chart/faculty-project','API\ChartApiController@facultyProjectChart');

});

Route::get('/img/{path}', function (League\Glide\Server $server, \Illuminate\Http\Request $request) {
    $server->outputImage($request);
})->where('path', '.*');


Route::get('/register','Guest\RegisterController@registerPage');

Route::get('test',function(){


});
