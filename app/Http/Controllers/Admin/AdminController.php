<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller {

	public function index()
	{
		return redirect('/admin/dashboard');
	}

    public function dashboard()
    {
        return view('admin.main');
    }
}
