<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\File;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseFileElement;

class Image extends BaseFileElement
{
    public function tag(): void
    {
        $this->tag = 'input type="image"';
    }

}