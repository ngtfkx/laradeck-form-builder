<?php

namespace Ngtfkx\Laradeck\FormBuilder\Layouts;


class Bootstrap3 extends AbstractLayout
{
    protected $cssFramework = 'bootstrap3';

    protected $commonClasses = 'form-control';

    public $skipElementClasses = [
        'button', 'checkbox', 'radio', 'submit', 'reset'
    ];

    protected $elementClasses = [
        'button' => 'btn btn-primary'
    ];

    protected function setFormClasses()
    {
        switch ($this->orientation) {
            case 'inline':
                $this->formClasses = 'form-inline';
                $this->orientationDir = 'inline';
                break;
            case 'horizontal':
                $this->formClasses = 'form-horizontal';
                $this->orientationDir = 'horizontal';
                break;
            default:
                $this->orientationDir = 'default';
                break;

        }
    }
}