<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


abstract class BaseSubmitElement extends AbstractElement
{
    public function __construct(?string $name = null, ?string $value = null)
    {
        parent::__construct();

        $this->name($name);

        $this->value($value);
    }
}