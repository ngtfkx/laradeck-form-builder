<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


class Color extends AbstractElement
{
    public function __construct(?string $name = null, ?string $value = null)
    {
        $this->name($name);

        $this->value($value);

        parent::__construct();
    }

    public function tag(): void
    {
        $this->tag = 'input type="color"';
    }

}