<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Text;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseTextElement;

class Number extends BaseTextElement
{
    public function tag(): void
    {
        $this->tag = 'input type="number"';
    }
}