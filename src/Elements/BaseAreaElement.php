<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


abstract class BaseAreaElement extends AbstractElement
{
    protected $needClose = true;

    public function __construct(?string $name = null, ?string $value = null)
    {
        parent::__construct();

        $this->name($name);

        $this->value($value);
    }

    protected function beforeToParts(): void
    {

    }

    protected function render(): string
    {
        $attributes = $this->generateAttributes();

        return '<' . $this->tag . $attributes . '>' . $this->value . '</' . $this->tag . '>';
    }
}