<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\File;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseFileElement;

class File extends BaseFileElement
{
    public function tag(): void
    {
        $this->tag = 'input type="file"';
    }

}