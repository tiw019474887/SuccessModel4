<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Project;
use \View;


class UserController  extends Controller {

    public function __construct()
    {
        View::share('role_name', 'User');
    }

	public function index()
	{
        $projects = Project::whereHas('status', function($q)
    {
        $q->where('key', '=', 'published');

    })->get();

		return view('users.project.main',[
            'projects' => $projects
        ]);
	}



    public function project($id)
    {
        $project = Project::find($id);


        return view('users.project.main1',[
            'project' => $project
        ]);
    }


    public function search(array $input)
    {
        $search = Project::with()->find(id);
    }

}
