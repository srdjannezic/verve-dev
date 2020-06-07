<?php namespace Verve\Templates\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Verve\Templates\Models\TemplatesModel;

class TemplatesController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Verve.Templates', 'main-menu-item');
    }

    public function onDuplicate() {
           $checked_items_ids = input('checked');

           foreach ($checked_items_ids as $id) {
              $original = TemplatesModel::where("id", $id)->first();

              $clone = $original->replicate();
              $clone->name = "Duplicate of ".$clone->name;
              $clone->slug = now()->timestamp."_".$clone->slug;
              $clone->client_id = $clone->client_id;
              $clone->published = 1;
              //$clone->highlight = 0;
                
              $clone->id = TemplatesModel::withTrashed()->max('id') + 1;
              $clone->save();
           }

           \Flash::success('Event cloned');
           return $this->listRefresh();
    }  
}
