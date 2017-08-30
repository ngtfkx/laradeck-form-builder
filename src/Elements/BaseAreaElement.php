<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


abstract class BaseAreaElement extends AbstractElement
{
    protected $needClose = true;

    public function __construct(?string $name = null, ?string $value = null)
    {
        $this->name($name);

        $this->value($value);

        parent::__construct();
    }

    protected function render(): string
    {
        $attributes = $this->generateAttributes();

        return '<' . $this->tag . $attributes . '>' . $this->value . '</' . $this->tag . '>';
    }

    public function __toString(): string
    {
        $this->addAttrAs('checked');

        return parent::__toString();
    }
}