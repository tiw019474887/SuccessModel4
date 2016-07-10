<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class YearProject extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['YearProject'];

    protected $fillable = ['yearProject'];

    public function projects(){
        return $this->hasMany("App\Models\Project","HAS");
    }

}