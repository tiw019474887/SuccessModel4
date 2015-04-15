<?php
/**
 * Created by PhpStorm.
 * User: chaow
 * Date: 4/14/2015 AD
 * Time: 5:53 PM
 */

namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class UserType extends \NeoEloquent{
    use SoftDeletes;

    protected $label = "UserType";

    public function users(){
        return $this->hasMany("User","HAS");
    }
}