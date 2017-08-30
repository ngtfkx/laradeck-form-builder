<?php

namespace Ngtfkx\Laradeck\FormBuilder\Layouts;


class Bootstrap3 extends AbstractLayout
{
    protected $cssFramework = 'bootstrap3';

    protected function setFormClasses()
    {
        switch ($this->orientation) {
            case 'inline':
                $this->formClasses = 'form-inline';
                break;
            case 'horizontal':
                $this->formClasses = 'form-horizontal';
                break;
            default:
                break;

        }
    }
}