<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Logo;
use App\Services\FacultyService;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectLogoApiController extends Controller {


    public function __construct(ProjectService $projectService){
        $this->projectService = $projectService;
    }

	/**
	 * Display a listing of the resource.
	 *
     * @param  int  $facultyId
	 * @return Response
	 */
	public function index($projectId)
	{
        /* @var Faculty $faculty */
		$project = $this->projectService->get($projectId);
        $logo = $project->logo()->orderBy('created_at','desc')->first();

        return $logo;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($projectId)
	{
		return $this->projectService->saveLogo($projectId, \Input::instance());
	}

	public function destroy($id)
	{
		//
	}

}
