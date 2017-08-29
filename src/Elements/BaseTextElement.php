<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


abstract class BaseTextElement extends AbstractElement
{
    public function __construct(?string $name = null, ?string $value = null)
    {
        $this->name($name);

        $this->value($value);

        parent::__construct();
    }
}