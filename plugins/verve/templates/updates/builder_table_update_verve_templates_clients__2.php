<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplatesClients2 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_clients_', function($table)
        {
            $table->string('logo', 1000)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_clients_', function($table)
        {
            $table->dropColumn('logo');
        });
    }
}
