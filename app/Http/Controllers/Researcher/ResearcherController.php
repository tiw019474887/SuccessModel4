<?php namespace App\Http\Controllers\Researcher;

use App\Http\Controllers\Controller;


class ResearcherController  extends Controller {

	public function index()
	{
		return view('researcher.project.main');
	}



}
