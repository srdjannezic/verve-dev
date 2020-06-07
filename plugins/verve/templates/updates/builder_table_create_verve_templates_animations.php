<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVerveTemplatesAnimations extends Migration
{
    public function up()
    {
        Schema::create('verve_templates_animations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('name', 255);
            $table->text('json');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('verve_templates_animations');
    }
}
