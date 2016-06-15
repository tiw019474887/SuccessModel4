<?php

use Ramsey\Uuid\Uuid;

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

Route::get('/', 'User\UserController@index');
//Route::get('/', 'WelcomeController@index');

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::group([
        'middleware' => 'admin'
    ]
    , function () {
        Route::get('/admin', 'Admin\AdminController@index');
        Route::get('/admin/dashboard', 'Admin\AdminController@dashboard');
        Route::get('/admin/faculty', 'Admin\AdminController@faculty');
        Route::get('/admin/user', 'Admin\AdminController@user');
        Route::get('/admin/area', 'Admin\AdminController@area');
        Route::get('/admin/role', 'Admin\AdminController@role');
        Route::get('/admin/project', 'Admin\AdminController@project');
        Route::get('/admin/project-status', 'Admin\AdminController@projectStatus');
        Route::get('/admin/api-key', 'Admin\AdminController@apikey');
        Route::get('/search', 'User\UserController@getSearch');
    });
Route::group([
        'middleware' => 'faculty'
    ]
    , function () {
        Route::get('/faculty', 'Faculty\FacultyController@index');
    });
Route::group([
        'middleware' => 'university'
    ]
    , function () {
        Route::get('/university', 'University\UniversityController@index');
    });
Route::group([
        'middleware' => 'researcher'
    ]
    , function () {
        Route::get('/researcher', 'Researcher\ResearcherController@index');
    });




Route::get('/user/edituser/', 'User\UserController@edituser');


Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'User\UserController@index');
    Route::get('/logout', 'User\UserController@logout');

    //faculty
    Route::get('/faculty', 'User\UserController@indexfaculty');
    Route::get('/faculty/Ag', 'User\UserController@ag');
    Route::get('/faculty/Ahs', 'User\UserController@ahs');
    Route::get('/faculty/Ar', 'User\UserController@ar');
    Route::get('/faculty/Dt', 'User\UserController@dt');
    Route::get('/faculty/Edu', 'User\UserController@edu');
    Route::get('/faculty/En', 'User\UserController@en');
    Route::get('/faculty/Fa', 'User\UserController@fa');
    Route::get('/faculty/Ict', 'User\UserController@ict');
    Route::get('/faculty/Law', 'User\UserController@law');
    Route::get('/faculty/Md', 'User\UserController@md');
    Route::get('/faculty/Medsci', 'User\UserController@medsci');
    Route::get('/faculty/Mis', 'User\UserController@mis');
    Route::get('/faculty/Nu', 'User\UserController@nu');
    Route::get('/faculty/Ps', 'User\UserController@ps');
    Route::get('/faculty/Sc', 'User\UserController@sc');
    Route::get('/faculty/Seen', 'User\UserController@seen');
    
    
    Route::get('/district/chiangkham', 'User\UserController@chiangkham');
    Route::get('/district/chiangmuan', 'User\UserController@chiangmuan');
    Route::get('/district/chun', 'User\UserController@chun');
    Route::get('/district/dokkhamtai', 'User\UserController@dokkhamtai');
    Route::get('/district/maechai', 'User\UserController@maechai');
    Route::get('/district/maung', 'User\UserController@maung');
    Route::get('/district/phukamyao', 'User\UserController@phukamyao');
    Route::get('/district/phusang', 'User\UserController@phusang');
    Route::get('/district/pong', 'User\UserController@pong');

    
    
    
    
    
    Route::get('/project/{id}', 'User\UserController@project');
    Route::get('/search', 'User\UserController@getSearch');
    Route::get('/view', 'User\UserController@viewusers');
    Route::post('/project/{id}/comment', 'User\UserController@addComment');
});


Route::group([
    'prefix' => 'm1',
], function () {
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    Route::post('auth/login', 'API\AuthApiController@mobileAuth');
    Route::post('auth/logout', 'API\AuthApiController@unAuthenticate');
    Route::get('auth/user', 'API\AuthApiController@user');


    Route::get('faculty', 'API\FacultyApiController@index');

    Route::get('faculty/{id}/project', 'API\ProjectApiController@facultyProject');
    Route::get('project', 'API\ProjectApiController@mobileIndex');
    Route::get('project/{id}', 'API\ProjectApiController@show');

    Route::get('/img/{path}', function (League\Glide\Server $server, \Illuminate\Http\Request $request) {
        $server->outputImage($request);
    })->where('path', '.*');

    Route::get('/downloads/{name}/files/{path}', function ($name, $path) {
        $filePath = storage_path() . '/app/' . $path;
        return Response::download($filePath, $name);
    })->where('path', '.*');

});

Route::group(['prefix' => 'api'], function () {

    //api for comment
    Route::get('comment/get-comment/{id}', 'API\ProjectCommentApiController@getComments');
    Route::post('comment/add-project-comment/{id}', 'API\ProjectCommentApiController@addProjectComments');
    Route::post('comment/add-comment-comment/{id}', 'API\ProjectCommentApiController@addCommentComments');

    //api for faculty
    Route::get('faculty/projects', 'API\FacultyProjectApiController@index');
    Route::get('faculty/get-project/{id}', 'API\FacultyProjectApiController@show');
    Route::post('faculty/submit-project/{id}', 'API\FacultyProjectApiController@acceptProject');
    Route::post('faculty/reject-project/{id}', 'API\FacultyProjectApiController@rejectProject');

    //api for university
    Route::get('university/projects', 'API\UniversityProjectApiController@index');
    Route::get('university/get-project/{id}', 'API\UniversityProjectApiController@show');
    Route::post('university/submit-project/{id}', 'API\UniversityProjectApiController@acceptProject');
    Route::post('university/reject-project/{id}', 'API\UniversityProjectApiController@rejectProject');

    //api for researcher
    Route::get('researcher/projects', 'API\ResearcherProjectApiController@index');
    Route::get('researcher/get-project/{id}', 'API\ResearcherProjectApiController@show');
    Route::get('researcher/get-suggestion/{id}', 'API\ResearcherProjectApiController@getSuggestion');
    Route::post('researcher/update-project/{id}', 'API\ResearcherProjectApiController@update');
    Route::post('researcher/add-project', 'API\ResearcherProjectApiController@store');
    Route::post('researcher/submit-project/{id}', 'API\ResearcherProjectApiController@acceptProject');

    //api for area
    Route::resource('area', 'API\AreaApiController');
    Route::get('area', 'API\AreaApiController@index');
    Route::get('area/get/{id}', 'API\AreaApiController@show');
    Route::post('area/update-area/{id}', 'API\AreaApiController@update');
    Route::post('area/add', 'API\AreaApiController@store');

    //api for published projects
    Route::get('publish/projects', 'API\PublishProjectApiController@index');

    Route::resource('faculty', 'API\FacultyApiController');
    Route::resource('faculty.logo', 'API\FacultyLogoApiController');
    Route::post('faculty/{id}/saveLogo', 'Api\FacultyApiController@saveLogo');


    Route::resource('faculty.user', 'API\FacultyUserApiController');

    Route::resource('user', 'API\UserApiController');
    Route::post('user/search', 'API\UserApiController@search');

    Route::resource('user.logo', 'API\UserLogoApiController');
    Route::resource('role', 'API\RoleApiController');

    Route::resource('project-status', 'API\ProjectStatusApiController');
    Route::resource('project', 'API\ProjectApiController');
    Route::resource('project.member', 'API\ProjectMemberApiController');
    Route::resource('project.image', 'API\ProjectImageApiController');
    Route::resource('project.cover', 'API\ProjectCoverApiController');
    Route::resource('project.youtube', 'API\ProjectYoutubeApiController');
    Route::resource('project.logo', 'API\ProjectLogoApiController');
    Route::post('project/{id}/saveLogo', 'Api\ProjectApiController@saveLogo');


    Route::resource('api-key', 'API\ApiKeyApiController');

    Route::get('project/{id}/previous-files', 'API\ProjectFileApiController@getPreviousFiles');
    Route::resource('project.file', 'API\ProjectFileApiController');
    Route::resource('project.status', 'API\ProjectProjectStatusApiController');


    Route::post('auth/login', 'API\AuthApiController@authenticate');
    Route::any('auth/logout', 'API\AuthApiController@unAuthenticate');
    Route::get('auth/user', 'API\AuthApiController@user');

    Route::get('chart/faculty-project', 'API\ChartApiController@facultyProjectChart');

});

Route::get('/img/{path}', function (League\Glide\Server $server, \Illuminate\Http\Request $request) {
    $server->outputImage($request);
})->where('path', '.*');

Route::get('/downloads/{name}/files/{path}', function ($name, $path) {
    $filePath = storage_path() . '/app/' . $path;
    return Response::download($filePath, $name);
})->where('path', '.*');

Route::get('/register', 'Guest\RegisterController@registerPage');

Route::get('test', function () {

    \App\Models\Project::reindex();

});

Route::post('tinymce-upload', function () {
    $uuid = Uuid::uuid4();
    $storage_path = "app/temp/";
    $destination_path = storage_path($storage_path);
    Input::file('file')->move($destination_path, $uuid);

    $url = "/img/temp/$uuid";
    $response = [
        'url' => $url,
        'base_url' => url()
    ];
    return $response;
});

