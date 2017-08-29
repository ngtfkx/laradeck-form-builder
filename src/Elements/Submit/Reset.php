<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Submit;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseSubmitElement;

class Reset extends BaseSubmitElement
{
    public function tag(): void
    {
        $this->tag = 'input type="reset"';
    }

}