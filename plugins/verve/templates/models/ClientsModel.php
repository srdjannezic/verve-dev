<?php namespace Verve\Templates\Models;

use Model;

/**
 * Model
 */
class ClientsModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'verve_templates_clients_';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasOne = [
        'template' => ['Verve\Templates\Models\TemplatesModel', 'key' => 'id']
    ];

}
