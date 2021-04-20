<?php
namespace Dizoo\Testimonials\components;

use Cms\Classes\ComponentBase;
use Dizoo\Testimonials\Models\Testimonials as Quotes;

class Testimonials extends ComponentBase {

    public function componentDetails()
    {
        return [
            'name' => 'Testimonials',
            'description' => 'Displays a testimonial slider on the page.'
        ];
    }

    public function onRun()
    {
        $testimonials = $this->getTestimonials();
        if($testimonials->isNotEmpty()) {
            $this->page['testimonials'] = $testimonials;
            if($this->property('css')) {
                $this->addCss('/plugins/dizoo/testimonials/assets/css/testimonial-slider.css');
            }
            if ($this->property('scripting')) {
                $this->addJs('/plugins/dizoo/testimonials/assets/js/testimonial-slider.js');
            }
        } else {
            $this->page['testimonials'] = false;
        }
    }

    public function getTestimonials()
    {
        return Quotes::orderBy('sort_order', 'ASC')->get();
    }
    
    public function defineProperties()
    {
        return [
            'backgroundColor' => [
                 'title'             => 'Background color',
                 'description'       => 'HEX code value',
                 'default'           => '#1b2945',
                 'type'              => 'string',
                 'validationPattern' => '^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$',
                 'validationMessage' => 'Please fill in a valid hex code with the #'
            ],
            'textColor' => [
                 'title'             => 'Text color',
                 'description'       => 'HEX code value',
                 'default'           => '#3db166',
                 'type'              => 'string',
                 'validationPattern' => '^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$',
                 'validationMessage' => 'Please fill in a valid hex code with the #'
            ],
            'scripting' => [
                'title'             => 'Include Scripting',
                'description'       => 'If you want to use your own scripting uncheck this',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'css' => [
                'title'             => 'Include CSS',
                'description'       => 'If you want to use custom CSS uncheck this',
                'default'           => true,
                'type'              => 'checkbox'
            ]
        ];
    }
}