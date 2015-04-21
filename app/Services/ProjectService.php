<?php
namespace App\Services;
use App\Models\Project;
use App\Models\Faculty;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Rhumsaa\Uuid\Uuid;

/**
 * Created by PhpStorm.
 * ProjectRequest: chaow
 * Date: 4/7/2015
 * Time: 3:03 PM
 */

class ProjectService extends Service{

    var $withArr = ['faculty','cover','logo'];

    public function getAll(){
        return Project::with($this->withArr)->get();
    }

    public function get($id){
        $project = Project::with($this->withArr)->find($id);
        return $project;
    }

    private function linkToFaculty(Project $project,array $input){
        if (isset($input['faculty'])){
            $id = $input['faculty']['id'];
            $faculty = Faculty::find($id);
            $project->faculty()->dissociate();
            $project->faculty()->associate($faculty)->save();
        }

        return $project;
    }

    public function store(array $input){

        if (!$this->hasProjectType($input)){
            return null;
        }

        $project = new Project();
        $project->fill($input);
        $project->save();
        $this->linkToFaculty($project,$input);
        return $project;
    }

    public function save(array $input){

        if (array_has($input,'id')){
            $id = $input['id'];
            /* @var Project $project */
            $project = Project::find($id);
            $project->fill($input);
            $project->save();
            $this->linkToFaculty($project,$input);
            return $project;
        }else {
            return $this->store($input);
        }
    }

    public function create()
    {
        return new Project();
    }

    public function delete($id){
        return [Project::find($id)->delete()];
    }

    public function saveLogo($id,Request $input){
        /* @var Project $project */
        $project = $this->get($id);
        $uuid = Uuid::uuid4();
        $storage_path= "app/projects/$id/logo/";
        $destination_path = storage_path($storage_path);
        $input->file('file')->move($destination_path,$uuid);

        $logo = $this->getLogoFromModel($project);
        $logo->url = "/img/projects/$id/logo/$uuid";
        $project->logo()->save($logo);
        return $logo;
    }


}
