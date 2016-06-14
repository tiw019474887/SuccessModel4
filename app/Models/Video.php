<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Video extends \NeoEloquent
{
    //use SoftDeletes;

    protected $label = ['Video'];

    public function project(){
        return $this->morphTo('App\Models\Project','VIDEO');
    }

}