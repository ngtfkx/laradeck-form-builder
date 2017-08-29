<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


class File extends AbstractElement
{
    public function __construct(?string $name = null)
    {
        $this->name($name);

        parent::__construct();
    }

    public function tag(): void
    {
        $this->tag = 'input type="file"';
    }

}