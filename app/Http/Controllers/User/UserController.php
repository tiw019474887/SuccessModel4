<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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

    public function search(array $input)
    {
        $search = Project::with()->find(id);
    }
}
