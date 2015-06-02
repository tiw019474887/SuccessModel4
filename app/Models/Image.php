<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * UserRequest: chaow
 * Date: 4/6/2015
 * Time: 12:59 PM
 */

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Image extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Image'];

    protected $fillable = ['url'];


    public function faculty(){
        return $this->morphTo('Faculty','HAS');
    }

}