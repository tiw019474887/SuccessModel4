<?php
namespace App\Services;

use App\Models\Comment;
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
class CommentProjectService extends ProjectService
{

    public function addComment($id,array $input){

        $comment = new Comment();
        $comment->fill($input);
        $comment->save();
        $this->linkToProject($comment, $input);
        $this->linkToCurrentUser($comment, $input);


        return $comment;
    }

    private function linkToProject(Comment $comment,$id, array $input)
    {
        $project = Project::find($id);
        if($project){
            $comment->project()->associate($project)->save();
        }
        return $project;
    }

    private function  linkToCurrentUser(Comment $comment, array $input)
    {
        $user = Auth::user();
        if($user){
            $comment->createdBy()->associate($user)->save();
        }
        return $comment;
    }



}
