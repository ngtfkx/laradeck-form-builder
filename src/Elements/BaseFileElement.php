<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


abstract class BaseFileElement extends AbstractElement
{
    protected $removeAttributes = [
        'value'
    ];

    public function __construct(?string $name = null)
    {
        parent::__construct();

        $this->name($name);
    }
}