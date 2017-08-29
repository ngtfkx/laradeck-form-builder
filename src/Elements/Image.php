<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


class Image extends AbstractElement
{
    public function __construct(?string $name = null)
    {
        $this->name($name);

        parent::__construct();
    }

    public function tag(): void
    {
        $this->tag = 'input type="image"';
    }

}