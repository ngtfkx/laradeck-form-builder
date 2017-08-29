<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements\Submit;


use Ngtfkx\Laradeck\FormBuilder\Elements\BaseSubmitElement;

class Submit extends BaseSubmitElement
{
    public function tag(): void
    {
        $this->tag = 'input type="submit"';
    }

}