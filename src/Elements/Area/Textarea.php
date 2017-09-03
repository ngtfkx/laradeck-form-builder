<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Area;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseAreaElement;

class Textarea extends BaseAreaElement
{
    protected $valueAsAttribute = false;

    public function tag(): void
    {
        $this->tag = 'textarea';
    }
}