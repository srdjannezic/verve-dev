<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplatesClients3 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_clients_', function($table)
        {
            $table->increments('id')->change();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_clients_', function($table)
        {
            $table->integer('id')->change();
        });
    }
}
