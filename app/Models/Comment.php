<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * UserRequest: chaow
 * Date: 4/6/2015
 * Time: 12:59 PM
 */

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Comment extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Comment'];

    protected $fillable = ['comment'];

    public function project(){
        return $this->hasOne("App\Models\Project","ON");
    }
    public function createdBy(){
        return $this->hasOne("App\Models\User","CREATE_BY");
    }
    public function comments(){
        return $this->hasMany("App\Models\Comments","HAS_COMMENT");
    }

}