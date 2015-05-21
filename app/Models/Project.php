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

    public function members(){
        return $this->hasMany("App\Models\User","HAS_MEMBER");
    }

    public function faculty(){
        return $this->belongsTo("App\Models\Faculty","HAS");
    }

    public function status(){
        return $this->belongsTo("App\Models\ProjectStatus","HAS_STATUS");
    }

    public function createdBy(){
        return $this->belongsTo("App\Models\User","CREATE");
    }

}