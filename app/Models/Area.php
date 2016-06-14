<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Area extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Area'];

    protected $fillable = ['name_th','lat', 'lon', 'zoom'];

    public function createdBy(){
        return $this->hasOne("App\Models\User","CREATE_BY");
    }

    public function projects(){
        return $this->hasMany("App\Models\Project","HAS_AREA");
    }

}