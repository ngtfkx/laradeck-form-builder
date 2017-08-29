<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


class Checkbox extends AbstractElement
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

    public function tag(): void
    {
        $this->tag = 'input type="checkbox"';
    }

    public function __toString()
    {
        $this->addAttrAs('checked');

        return parent::__toString();
    }
}