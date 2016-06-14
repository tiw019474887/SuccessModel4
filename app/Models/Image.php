<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Image extends \NeoEloquent
{

    protected $label = ['Image'];

    protected $fillable = ['url'];


    public function faculty(){
        return $this->morphTo('App\Models\Faculty','PHOTO');
    }

    public function project(){
        return $this->morphTo('App\Models\Project','PHOTO');
    }

}