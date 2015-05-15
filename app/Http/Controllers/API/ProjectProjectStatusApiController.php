<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Services\FacultyService;
use App\Services\ProjectService;
use App\Services\UserService;
use \Input;
class ProjectProjectStatusApiController extends Controller {


    public function __construct(ProjectService $service){
        $this->service = $service;
    }

	/**
	 * Display a listing of the resource.
	 *
     * @param  int  $projectId
	 * @return Response
	 */
	public function index($projectId)
	{
        $project = $this->service->get($projectId);
        return $project->status;
	}

	/**
	 * Update Status to project
     *
     * @param  int  $projectId
     * @return Response
	 */
	public function store($projectId)
	{
		$result =  $this->service->updateStatus($projectId,Input::all());
        if ($result){
            return $result;
        }else {
            return response("There was an error. Please contact Administrator.",400);
        }
	}
}
