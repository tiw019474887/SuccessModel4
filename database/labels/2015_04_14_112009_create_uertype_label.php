<?php

use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class CreateUertypeLabel extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('UserType', function(Blueprint $label)
        {
            $label->unique('key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Neo4jSchema::label('UserRequest', function(Blueprint $label)
        {
            $label->dropUnique('uuid');
        });
    }

}
