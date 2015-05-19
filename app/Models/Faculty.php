<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * UserRequest: chaow
 * Date: 4/6/2015
 * Time: 12:59 PM
 */

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Faculty extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Faculty'];

    protected $fillable = ['name_th'];

//    public function cover(){
//        return $this->hasOne('Photo','COVER');
//    }
//
//    public function photos(){
//        return $this->hasMany('Photo','PHOTO');
//    }
//
    public function logo(){
        return $this->hasOne('App\Models\Logo','HAS');
    }
//
    public function users(){
        return $this->belongsToMany("App\Models\User","WORK_IN");
    }

    public function projects(){
        return $this->hasMany("App\Models\Project","HAS");
    }

}