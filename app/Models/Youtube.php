<?php
namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\SoftDeletes;


class Youtube extends Video
{
    //use SoftDeletes;

    protected $label = ['Youtube','Video'];

    protected $fillable = ['url','title','description','thumbnail_url','vid'];

    public function project(){
        return $this->morphTo('App\Models\Project','VIDEO');
    }

}