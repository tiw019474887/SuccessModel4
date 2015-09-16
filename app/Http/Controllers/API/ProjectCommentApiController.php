<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Models\Project;
use App\Services\FacultyService;
use App\Services\ProjectService;
use App\Services\ResearcherProjectService;
use App\Services\CommentProjectService;
use Illuminate\Http\Request;
use \Input;
use Vinelab\NeoEloquent\Tests\Functional\Relations\HyperMorphTo\Comment;

class ProjectCommentApiController extends Controller {


    function __construct(CommentProjectService $commentProjectService)
    {
        $this->commentProjectService = $commentProjectService;
    }

    public function getComments($id){

        return $this->commentProjectService->getCommentFromProject($id);

    }

    public function addProjectComment($id)
    {
      return $this->commentProjectService->addCommentToProject($id,Input::all());

    }

    public function addCommentComment($id)
    {
        return $this->commentProjectService->addCommentToComment($id,Input::all());

    }

    public function delete($id){
        return $this->commentProjectService->delete($id);
    }


}
