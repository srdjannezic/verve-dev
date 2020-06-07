<?php namespace Verve\Templates\Models;

use Model;
use Illuminate\Support\Str;
use Html;
/**
 * Model
 */
class TemplatesModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $jsonable = ['heroblock','includes','slider','how_it_works','work','about','cta_box','register_message', 'visual_legacies', 'mosaic_gallery'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'verve_templates_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];



    public $belongsTo = [
        'client' => [
            'Verve\Templates\Models\ClientsModel',
            'key' => 'client_id'
        ],
        'animation' => [
            'Verve\Templates\Models\AnimationsModel',
            'key' => 'animation_id',          
        ]
    ];

    public function beforeSave()
    {
        $this->name = Html::strip($this->name);

        if(!$this->seo_title){
            $this->seo_title = Html::strip($this->name);
        }
        if(!$this->seo_description){
            $this->seo_description = Html::strip($this->heroblock[0]['title']);
        }
        if(!$this->seo_image){
            $this->seo_image = $this->heroblock[0]['hero_image'];
        }
        if(!$this->slug)
        $this->slug = Str::slug($this->name);
    }

}

