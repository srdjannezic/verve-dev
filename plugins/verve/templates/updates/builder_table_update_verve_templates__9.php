<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates9 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('visual_legacies')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('visual_legacies');
        });
    }
}
