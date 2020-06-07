<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates16 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('animation');
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('animation')->nullable();
        });
    }
}
