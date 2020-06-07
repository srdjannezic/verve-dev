<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateVerveTemplatesClients extends Migration
{
    public function up()
    {
        Schema::create('verve_templates_clients_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->text('name');
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('verve_templates_clients_');
    }
}
