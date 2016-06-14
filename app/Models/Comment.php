<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Comment extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Comment'];

    protected $fillable = ['comment'];


    public function createdBy(){
        return $this->hasOne("App\Models\User","CREATE_BY");
    }

}