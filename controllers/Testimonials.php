<?php namespace Dizoo\Testimonials\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Testimonials extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'manage-testimonials' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dizoo.Testimonials', 'main-menu-item');
    }
}
