<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Services\FacultyService;
use App\Services\UserService;
use \Input;
class FacultyUserApiController extends Controller {


    public function __construct(FacultyService $facultyService, UserService $userService){
        $this->facultyService = $facultyService;
        $this->userService = $userService;
    }

	/**
	 * Display a listing of the resource.
	 *
     * @param  int  $facultyId
	 * @return Response
	 */
	public function index($facultyId)
	{
        /* @var Faculty $faculty */
        $faculty = $this->facultyService->get($facultyId);
        $users = $faculty->users;

        return $users;
	}

	/**
	 * Add User to the faculty.
     *
     * @param  int  $facultyId
     * @return Response
	 */
	public function store($facultyId)
	{
        $faculty = $this->facultyService->get($facultyId);
		$result =  $this->facultyService->addUser($facultyId, Input::all());
        if ($result){
            return $result;
        }else {
            return response("There was an error. Please contact Administrator.",400);
        }
	}

    /**
     * Remove User form faculty
     * @param  int  $facultyId
     * @return Response
     */

	public function destroy($facultyId,$userId)
	{
        $result =  $this->facultyService->deleteUser($facultyId, $userId);
        if ($result){
            return $result;
        }else {
            return response("There was an error. Please contact Administrator.",400);
        }
	}

}
