<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use \View;


class UserController  extends Controller {

    public function __construct()
    {
        View::share('role_name', 'Faculty');
    }

	public function index()
	{
		return view('user.project.main');
	}



}
