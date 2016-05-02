<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Suggestion extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Suggestion'];

    protected $fillable = ['suggestion'];


    public function createdBy(){
        return $this->hasOne("App\Models\User","CREATE_BY");
    }


}