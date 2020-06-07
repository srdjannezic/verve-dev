<?php namespace Verve\Templates;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    	return ['Verve\Templates\Components\TemplatesCmp'=>'Template'];
    }

    public function registerSettings()
    {
    }
}
