<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


abstract class BaseCheckedElement extends AbstractElement
{
    public $checked = false;

    public function __construct(?string $name = null, ?string $value = '1', ?bool $state = false)
    {
        $this->name($name);

        $this->value($value);

        $this->checked($state);

        parent::__construct();
    }

    public function checked(?bool $state = true)
    {
        $this->checked = $state ?: false;
    }

    protected function beforeToParts(): void
    {
        $this->addAttrAs('checked');

        parent::beforeToParts();
    }

    public function __toString(): string
    {
        $this->addAttrAs('checked');

        return parent::__toString();
    }
}