<?php namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;


class FacultyController  extends Controller {

	public function index()
	{
		return view('faculty.project.main');
	}



}
