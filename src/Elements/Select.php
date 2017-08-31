<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


class Select extends AbstractElement
{
    protected $selected;

    public function __construct(?string $name = null, ?string $value = null, ?iterable $options = null)
    {
        parent::__construct();

        $this->name($name);

        $this->selected($value);

        if(!empty($options)) {
            $isIndexed = array_keys($options) === range(0, count($options) - 1);

            $opt = '';
            foreach($options as $key => $val) {
                $selected = ($isIndexed ? $val : $key) == $value ? ' selected="selected"' : '';
                $opt .= '<option value="' . ($isIndexed ? $val : $key) . '"' . $selected . '>' . $val . '</option>';
            }

            $this->value($opt);
        }
    }

    public function selected($value = null)
    {
        $this->selected = $value;
    }

    public function tag(): void
    {
        $this->tag = 'select';
    }

    protected function getTagHtml()
    {
        return '<' . $this->tag . '**attributes**>' . $this->value . '</' . $this->tag . '>';
    }

}