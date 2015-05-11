<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * UserRequest: chaow
 * Date: 4/6/2015
 * Time: 12:59 PM
 */

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Project extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Project'];

    protected $fillable = ['name','abstract'];

    public function cover(){
        return $this->hasOne('App\Models\Image','COVER');
    }

    public function photos(){
        return $this->hasMany('App\Models\Image','PHOTO');
    }

    public function logo(){
        return $this->hasOne('App\Models\Logo','HAS');
    }

    public function researchers(){
        return $this->hasMany("App\Models\User","RESEARCH_BY");

    }

    public function faculty(){
        return $this->belongsTo("App\Models\Faculty","HAS");
    }

}