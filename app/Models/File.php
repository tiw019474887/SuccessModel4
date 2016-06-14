<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class File extends \NeoEloquent
{
    //use SoftDeletes;

    protected $label = ['File'];

    protected $fillable = ['url'];

    public function project(){
        return $this->morphTo('App\Models\Project','FILE');
    }

}