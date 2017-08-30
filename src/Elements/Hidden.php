<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


class Hidden extends AbstractElement
{
    public function __construct(?string $name = null, ?string $value = null)
    {
        parent::__construct();

        $this->name($name);

        $this->value($value);
    }

    public function tag(): void
    {
        $this->tag = 'input type="hidden"';
    }

}