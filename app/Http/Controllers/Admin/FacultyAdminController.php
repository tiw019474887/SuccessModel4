<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class FacultyAdminController  extends Controller {

	public function index()
	{
		return view('admin.faculty.main');
	}

}
