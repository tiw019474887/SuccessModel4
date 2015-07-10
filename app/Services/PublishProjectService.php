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
class PublishProjectService extends ResearcherProjectService
{


    public function PublishProject()
    {

        $projects = Project::with(['createdBy', 'faculty','status'])->whereHas('status', function($q)
        {
            $q->where('key', '=', 'publish');

        })->get();


        return $projects;
    }

}
