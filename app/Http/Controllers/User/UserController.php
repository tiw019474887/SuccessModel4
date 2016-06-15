<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Faculty;
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

    public function index()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.main', [
            'projects' => $projects,

        ]);
    }

    public function indexdistrict()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function chiangkham()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function chiangmuan()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function chun()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }


    public function dokkhamtai()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }


    public function maechai()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function maung()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function phukamyao()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function phusang()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }

    public function pong()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.maindistrict', [
            'projects' => $projects,

        ]);
    }
////////////// faculty
    public function indexfaculty()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfaculty', [
            'projects' => $projects,

        ]);
    }

    public function ag()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfacultyAg', [
            'projects' => $projects,

        ]);
    }
    public function ash()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyAsh', [
            'projects' => $projects,

        ]);
    }
    public function ar()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyAr', [
            'projects' => $projects,

        ]);
    }
    public function dt()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyDt', [
            'projects' => $projects,

        ]);
    }
    public function edu()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyEdu', [
            'projects' => $projects,

        ]);
    }
    public function en()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyEn', [
            'projects' => $projects,

        ]);
    }
    public function fa()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyFa', [
            'projects' => $projects,

        ]);
    }
    public function ict()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyIct', [
            'projects' => $projects,

        ]);
    }
    public function law()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyLaw', [
            'projects' => $projects,

        ]);
    }
    public function md()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyMd', [
            'projects' => $projects,

        ]);
    }
    public function medsci()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyMedsci', [
            'projects' => $projects,

        ]);
    }
    public function mis()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyMis', [
            'projects' => $projects,

        ]);
    }
    public function nu()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyNu', [
            'projects' => $projects,

        ]);
    }
    public function ps()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultyPs', [
            'projects' => $projects,

        ]);
    }
    public function sc()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultySc', [
            'projects' => $projects,

        ]);
    }
    public function seen()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty.mainfacultySeen', [
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

        $projects = Project::where('name', '=~', ".*$keyword.*")
            ->whereHas('status', function ($t) {
            $t->where('key', '=', 'published');
            })->paginate(6);
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

    public function edituser()
    {
        return view('admin.user.main2');
    }
    public function delComment($projectId)
    {
        $user = \Auth::user();

        $comment = new Comment();
        $comment-> comment = \Input::get("comment");
        $project = Project::find($projectId);
        $project->comments()->save($comment);
        $comment->createdBy()->save($user);

        return redirect("/users/project/$projectId");

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }

}
