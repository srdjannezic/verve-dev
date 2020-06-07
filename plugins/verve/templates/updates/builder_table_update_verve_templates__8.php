<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates8 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('image_for_includes')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('image_for_includes');
        });
    }
}
