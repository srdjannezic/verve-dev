<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates3 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->integer('published')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('published');
        });
    }
}
