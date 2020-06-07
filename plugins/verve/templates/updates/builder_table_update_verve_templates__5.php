<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates5 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('logo');
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('logo')->nullable();
        });
    }
}
