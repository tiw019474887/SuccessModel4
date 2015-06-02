<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Logo;
use App\Services\FacultyService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserLogoApiController extends Controller {


    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

	/**
	 * Display a listing of the resource.
	 *
     * @param  int  $facultyId
	 * @return Response
	 */
	public function index($id)
	{
        /* @var Faculty $faculty */
        $user = $this->userService->get($id);
        $logo = $user->logo()->orderBy('created_at','desc')->first();

        return $logo;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		return $this->userService->saveLogo($id, \Input::instance());
	}

	public function destroy($id)
	{
		//
	}

}
