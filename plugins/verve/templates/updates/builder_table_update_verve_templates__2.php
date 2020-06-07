<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates2 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->string('slug', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
