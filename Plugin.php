<?php namespace Dizoo\Testimonials;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            \Dizoo\Testimonials\Components\Testimonials::class       => 'testimonials'
        ];
    }

    public function registerSettings()
    {
    }
}
