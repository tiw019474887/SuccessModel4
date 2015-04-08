<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * User: chaow
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
        return $this->hasOne("Photo","LOGO");
    }
//
//    public function researchers(){
//        return $this->hasMany('Researcher','HAS');
//    }

}