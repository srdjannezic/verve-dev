<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates14 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('animation')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('animation');
        });
    }
}
