<?php
namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Logo extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Logo'];

    protected $fillable = ['url'];


    public function faculty(){
        return $this->morphTo('Faculty','HAS');
    }

    public function project(){
        return $this->morphTo('App\Models\Project','HAS');
    }

}