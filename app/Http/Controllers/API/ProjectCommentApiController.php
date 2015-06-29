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

class ProjectCommentApiController extends Controller {


    function __construct(CommentProjectService $commentProjectService)
    {
        $this->commentProjectService = $commentProjectService;
    }

    public function index($projectId)
    {
        /* @var Project $project */
        $project = $this->commentprojectService->get($projectId);
        $comment = $project->comments;

        return $comment;
    }

    public function store($projectId)
    {
      return $this->commentProjectService->save($projectId,Input::instance());

    }



}
