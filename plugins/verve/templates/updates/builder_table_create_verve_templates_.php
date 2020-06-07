<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVerveTemplates extends Migration
{
    public function up()
    {
        Schema::create('verve_templates_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('client_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('verve_templates_');
    }
}
