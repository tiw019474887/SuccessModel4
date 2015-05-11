<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class UserAdminController  extends Controller {

	public function index()
	{
		return view('admin.user.main');
	}


}
