<?php
namespace App\Models;

/**
 * Created by PhpStorm.
 * User: chaow
 * Date: 4/6/2015
 * Time: 12:59 PM
 */

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Logo extends \NeoEloquent
{

    use SoftDeletes;

    protected $label = ['Logo'];

    protected $fillable = ['url'];


    public function faculty(){
        return $this->morphTo('Faculty','HAS');
    }

}