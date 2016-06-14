<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\SoftDeletes;

class Project extends \NeoEloquent
{

    use SoftDeletes;
    //use ElasticquentTrait;

    protected $mappingProperties = [
        'name' => [
            'type' => 'string',
            'analyzer' => 'thai'
        ],
        'abstract' => [
            'type' => 'string',
            'analyzer' => 'thai'
        ],
        'content' => [
            'type' => 'string',
            'analyzer' => 'thai'
        ]
    ];

    protected $label = ['Project'];

    protected $fillable = ['name','nameEN','abstract','abstractEN','content','contentEN','yearProject'];

    public function cover(){
        return $this->hasOne('App\Models\Image','COVER');
    }

    public function images(){
        return $this->hasMany('App\Models\Image','PHOTO');
    }

    public function logo(){
        return $this->hasOne('App\Models\Logo','HAS');
    }

    public function members(){
        return $this->hasMany("App\Models\User","HAS_MEMBER");
    }

    public function faculty(){
        return $this->belongsTo("App\Models\Faculty","HAS");
    }

    public function status(){
        return $this->belongsTo("App\Models\ProjectStatus","HAS_STATUS");
    }

    public function createdBy(){
        return $this->belongsTo("App\Models\User","CREATE");
    }

    public function comments(){
        return $this->hasMany("App\Models\Comment","HAS_COMMENT");
    }

    public function suggestion(){
        return $this->hasMany("App\Models\Suggestion","HAS_SUGGESTION");
    }

    public function current_file(){
        return $this->hasOne("App\Models\File","CURRENT_FILE");
    }

    public function files(){
        return $this->hasMany("App\Models\File","FILE");
    }

    public function videos(){
        return $this->hasMany("App\Models\Video","VIDEO");
    }

    public function youtubes(){
        return $this->hasMany("App\Models\Youtube","VIDEO");
    }

    public  function area(){
        return $this->belongsTo("App\Models\Area","HAS_AREA");
    }
}