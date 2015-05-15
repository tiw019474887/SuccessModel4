<?php namespace App\Services;

/**
 * Created by PhpStorm.
 * User: chaow
 * Date: 2/12/2015 AD
 * Time: 12:21 PM
 */

use App\Models\ProjectStatus as ProjectStatus;

class ProjectStatusService extends Service
{

    public function all()
    {
        return ProjectStatus::all();
    }


    public function getById($id)
    {
        return ProjectStatus::find($id);
    }

    public function create()
    {
        return new ProjectStatus();
    }

    public function store(array $input)
    {
        return $this->save($input);
    }

    public function save(array $input)
    {


        if (isset($input['id'])) {
            $id = $input['id'];
            /* @var ProjectStatus $projectStatus */
            $projectStatus = ProjectStatus::find($id);
            $projectStatus->update($input);
            $projectStatus->save();

            return $projectStatus;
        } else {
            $projectStatus = ProjectStatus::firstOrNew($input);
            $projectStatus->save();
            return $projectStatus;
        }

    }

    public function delete($id)
    {
        /* @var ProjectStatus $projectStatus */
        $projectStatus = ProjectStatus::find($id);
        $projectStatus->delete();
        return $projectStatus;

    }

}