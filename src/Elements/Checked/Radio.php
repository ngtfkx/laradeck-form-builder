<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Checked;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseCheckedElement;

class Radio extends BaseCheckedElement
{
    public function tag(): void
    {
        $this->tag = 'input type="radio"';
    }
}