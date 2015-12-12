<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Models\Project;
use App\Services\FacultyService;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use \Input;

class ProjectApiController extends Controller {

    public function __construct(ProjectService $projectService){
        $this->projectService = $projectService;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->projectService->getAll();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return $this->projectService->create();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		return $this->projectService->store(Input::all());
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $this->projectService->get($id);
	}

	/**
	 * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
	 */
	public function edit($id)
	{
        return $this->projectService->get($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        return $this->projectService->save(Input::all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return [$this->projectService->delete($id)];
	}


    public function researcherProjects(){
        return $this->projectService->getCurrentResearcherProjects();
    }

	public function facultyProject($faculty_id){

		$projects = Project::with(['logo'])
			->whereHas('faculty',function($q) use ($faculty_id){
				$q->where('id','=',$faculty_id);
			})
			->get();
		return $projects;
	}

}
