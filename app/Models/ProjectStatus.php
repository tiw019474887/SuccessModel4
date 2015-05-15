<?php namespace App\Models;

class ProjectStatus extends \NeoEloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ProjectStatus';

    protected $connection = 'neo4j';

    protected $fillable = ['name', 'description'];



}