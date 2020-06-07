<?php namespace Verve\Templates\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateVerveTemplates4 extends Migration
{
    public function up()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->text('logo')->nullable();
            $table->text('heroblock')->nullable();
            $table->text('includes')->nullable();
            $table->text('slider')->nullable();
            $table->text('locations')->nullable();
            $table->text('stories')->nullable();
            $table->text('facts')->nullable();
            $table->text('cta_box')->nullable();
            $table->text('register_message')->nullable();
            $table->string('name', 255)->nullable()->change();
            $table->integer('client_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('verve_templates_', function($table)
        {
            $table->dropColumn('logo');
            $table->dropColumn('heroblock');
            $table->dropColumn('includes');
            $table->dropColumn('slider');
            $table->dropColumn('locations');
            $table->dropColumn('stories');
            $table->dropColumn('facts');
            $table->dropColumn('cta_box');
            $table->dropColumn('register_message');
            $table->string('name', 255)->nullable(false)->change();
            $table->integer('client_id')->nullable(false)->change();
        });
    }
}
