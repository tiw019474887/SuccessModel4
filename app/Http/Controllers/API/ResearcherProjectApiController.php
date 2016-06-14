<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Models\Project;
use App\Services\FacultyService;
use App\Services\ProjectService;
use App\Services\ResearcherProjectService;
use Illuminate\Http\Request;
use \Input;

class ResearcherProjectApiController extends Controller {


    function __construct(ResearcherProjectService $researcherProjectService)
    {
        $this->researcherProjectService = $researcherProjectService;
    }

    public function index(){
        return $this->researcherProjectService->getProjects();
    }

    public function store()
    {
        return $this->researcherProjectService->addProject(Input::all());
    }

    public function show($id){
        return $this->researcherProjectService->get($id);
    }

    public function update($id){
        return $this->researcherProjectService->update(Input::all());
    }

    public function destroy($id){
        return $this->researcherProjectService->delete($id);
    }

    public function acceptProject($id){
        return $this->researcherProjectService->submitProject($id,Input::all());
    }

    public function getSuggestion($id){
        return $this->researcherProjectService->getSuggestion(zz);
    }


}
