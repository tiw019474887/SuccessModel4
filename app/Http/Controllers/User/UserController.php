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

    public function indexMaung()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอเมือง');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainmaung', [
            'projects' => $projects,

        ]);
    }

    public function indexMaeChai()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอแม่ใจ');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainmaechai', [
            'projects' => $projects,

        ]);
    }

    public function indexChiangMuan()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอเชียงม่วน');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainchiangmuan', [
            'projects' => $projects,

        ]);
    }

    public function indexDokKhamtai()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอดอกคำใต้');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.maindkkhamtai', [
            'projects' => $projects,

        ]);
    }

    public function indexPhuKamyao()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอภูกามยาว');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainphukamyao', [
            'projects' => $projects,

        ]);
    }

    public function indexPhuSang()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอภูซาง');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainphusang', [
            'projects' => $projects,

        ]);
    }

    public function indexChiangKham()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอเชียงคำ');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainchiangkham', [
            'projects' => $projects,

        ]);
    }

    public function indexChun()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอจุน');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainchun', [
            'projects' => $projects,

        ]);
    }

    public function indexPong()
    {
        $projects = Project::whereHas('area',function($a){
            $a->where('name_th','=','อำเภอปง');

        },'status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate();

        return view('users.maindistrict.mainpong', [
            'projects' => $projects,

        ]);
    }

    public function indexfaculty()
    {
        $projects = Project::whereHas('status', function ($q) {
            $q->where('key', '=', 'published');

        })->paginate(12);

        return view('users.project.mainfaculty', [
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
