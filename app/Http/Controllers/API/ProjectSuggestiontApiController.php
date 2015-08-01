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
use Vinelab\NeoEloquent\Tests\Functional\Relations\HyperMorphTo\Comment;

class ProjectSuggestionApiController extends Controller {


    function __construct(SuggestionProjectService $suggestionProjectService)
    {
        $this->suggestionProjectService = $suggestionProjectService;
    }

    public function getSuggestions($id){

        return $this->suggestionProjectService->getSuggestionFromProject($id);

    }

    public function addProjectSuggestion($id)
    {
      return $this->suggestionProjectService->addSuggestionToProject($id,Input::all());

    }

    public function delete($id){
        return $this->suggestionProjectService->delete($id);
    }


}
