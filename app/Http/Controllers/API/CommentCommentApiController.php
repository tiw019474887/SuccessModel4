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

class CommentCommentApiController extends Controller {


    function __construct(CommentProjectService $commentProjectService)
    {
        $this->commentProjectService = $commentProjectService;
    }

    public function index($commentId)
    {
        /* @var Project $project */
        $maincomment = $this->commentprojectService->get($commentId);
        $comment = $maincomment->comments;

        return $comment;
    }

    public function store($commentId)
    {
        return $this->commentProjectService->save($commentId,Input::instance());

    }

}
