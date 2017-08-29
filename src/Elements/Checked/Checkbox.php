<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Checked;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseCheckedElement;

class Checkbox extends BaseCheckedElement
{
    public function tag(): void
    {
        $this->tag = 'input type="checkbox"';
    }
}