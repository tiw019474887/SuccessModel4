<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Project;
use \View;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function __construct()
    {
        View::share('role_name', 'User');
    }

    public function viewusers()
    {
        return view('users.project.mains');
    }

    public function index()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.main', [
            'projects' => $projects,

        ]);
    }

    public function project($id)
    {
        $project = Project::find($id);


        return view('users.project.main1', [
            'project' => $project
        ]);
    }


    public function getSearch()
    {

        $keyword = \Input::get('keyword');

        $projects = Project::where('name', '=~', ".*$keyword.*")->paginate(6);
        $projects->appends(['keyword' => $keyword]);
        return view('users.project.main')
            ->with('projects', $projects)
            ->with('keyword', $keyword);
    }

    public function addComment($projectId)
    {
        $user = \Auth::user();

        $comment = new Comment();
        $comment-> comment = \Input::get("comment");
        $project = Project::find($projectId);
        $project->comments()->save($comment);

        $comment->createdBy()->save($user);

        return redirect("/users/project/$projectId");

    }


}
