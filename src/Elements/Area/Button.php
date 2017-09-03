<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Area;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseAreaElement;

class Button extends BaseAreaElement
{
    protected $valueAsAttribute = false;

    public function tag(): void
    {
        $this->tag = 'button';
    }
}