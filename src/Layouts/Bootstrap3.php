<?php

namespace Ngtfkx\Laradeck\FormBuilder\Layouts;


class Bootstrap3 extends AbstractLayout
{
    protected $cssFramework = 'bootstrap3';

    protected $commonClasses = 'form-control';

    public $skipCommonClassesForElements = [
        'button', 'checkbox', 'radio', 'submit', 'reset', 'form'
    ];

    protected $elementClasses = [
        'button' => 'btn btn-primary',
        'submit' => 'btn btn-primary',
        'reset' => 'btn btn-warning',
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