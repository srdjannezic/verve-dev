<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates6 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('how_it_works')->nullable();
            $table->text('work')->nullable();
            $table->text('about')->nullable();
            $table->dropColumn('locations');
            $table->dropColumn('stories');
            $table->dropColumn('facts');
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('how_it_works');
            $table->dropColumn('work');
            $table->dropColumn('about');
            $table->text('locations')->nullable();
            $table->text('stories')->nullable();
            $table->text('facts')->nullable();
        });
    }
}
