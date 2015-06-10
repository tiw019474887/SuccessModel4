<?php namespace App\Http\Controllers\University;

use App\Http\Controllers\Controller;


class UniversityController  extends Controller {

	public function index()
	{
		return view('university.project.main');
	}



}
