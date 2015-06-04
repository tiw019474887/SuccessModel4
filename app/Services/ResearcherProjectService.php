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
class ResearcherProjectService extends ProjectService
{


    public function getProjects()
    {
        $projects = \App\Models\Project::with(['createdBy', 'faculty'])->get();

        $fil_projects = [];

        foreach ($projects as $project) {
            if ($project->createdBy) {
                if ($project->createdBy->id == Auth::user()->id) {
                        array_push($fil_projects, $project);
                }
            }
        }

        return $fil_projects;
    }

    public function addProject(array $input){
        $project = new Project();
        $project->fill($input);
        $project->save();
        $this->linkToCurrentUser($project, $input);
        $this->linkToFaculty($project, $input);
        $this->linkToDraftStatus($project, $input);

        return $project;
    }

    private function linkToDraftStatus(Project $project, array $input)
    {
        $draft = ProjectStatus::where('key','=','draft');
        if($draft){
            $project->status()->associate($draft)->save();
        }
        return $project;
    }

    private function  linkToCurrentUser(Project $project, array $input)
    {
        $user = Auth::user();
        if($user){
            $project->createdBy()->associate($user)->save();
        }
        return $project;
    }

    private function linkToFaculty(Project $project, array $input)
    {
        $faculty = $project->createdBy->faculty;
        if($faculty){
            $project->faculty()->associate($faculty)->save();
        }

        return $project;
    }

    public function submitProject($id,array $input){
        $project = Project::find($id);
        if($project){
            $this->linkToFacultyStatus($project,$input);
        }
    }
    private function linkToFacultyStatus(Project $project, array $input)
    {
        $faculty = ProjectStatus::where('key','=','faculty');
        if($faculty){
            $project->status()->associate($faculty)->save();
        }
        return $project;
    }
}
