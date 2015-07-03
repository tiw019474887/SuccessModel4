<?php
namespace App\Services;

use App\Models\Project;
use App\Models\Faculty;
use App\Models\Logo;
use App\Models\ProjectStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Rhumsaa\Uuid\Uuid;
use \Auth;


/**
 * Created by PhpStorm.
 * ProjectRequest: chaow
 * Date: 4/7/2015
 * Time: 3:03 PM
 */
class UniversityProjectService extends ResearcherProjectService
{

    public function getUniversityStatusProjects()
    {

        $projects = Project::with(['createdBy', 'faculty','status'])->whereHas('status', function($q)
        {
            $q->where('key', '=', 'university');

        })->get();


        return $projects;
    }
    public function acceptProject($id,array $input){
        $project = Project::find($id);
        if($project){
            $this->linkToPublish($project,$input);
        }
    }
    private function linkToPublish(Project $project, array $input)
    {
        $publish = ProjectStatus::where('key','=','publish');
        if($publish){
            $project->status()->associate($publish)->save();
        }
        return $project;
    }

    public function rejectProject($id,array $input){
        $project = Project::find($id);
        if($project){
            $this->linkToFacultyStatus($project,$input);
        }
    }


}
