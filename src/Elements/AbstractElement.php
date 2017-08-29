<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


use Illuminate\Support\Collection;
use Ngtfkx\Laradeck\FormBuilder\Traits;

abstract class AbstractElement
{
    use Traits\Common;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $tag;

    abstract function tag();

    protected $parts = [];

    public function __construct()
    {
        $this->classes = new Collection();

        $this->attributes = new Collection();

        $this->styles = new Collection();

        $this->parts = new Collection();

        $this->tag();
    }

    public function value($value): self
    {
        $this->value = $value;

        return $this;
    }

    public function __toString()
    {
        $this->addAttr('id', 'name');

        $attributes = '';

        if ($this->classes->isNotEmpty()) {
            $this->parts->put('class', $this->classes->implode(' '));
        }

        if ($this->styles->isNotEmpty()) {
            $this->parts->put('style', $this->styles->pipe(function ($styles) {
                $styleAttr = '';
                foreach ($styles as $key => $value) {
                    $styleAttr .= $key . ':' . $value . ';';
                }

                return $styleAttr;
            }));
        }

        foreach ($this->parts as $key => $value) {
            if (is_bool($value) && $value === false) {
                continue;
            }
            $attributes .= ' ' . $key . '="' . $value . '"';
        }

        foreach ($this->attributes as $key => $value) {
            if (is_bool($value) && $value === false) {
                continue;
            } else if (is_bool($value)) {
                $value = $key;
            }
            $attributes .= ' ' . $key . '="' . $value . '"';
        }

        return '<' . $this->tag . $attributes . '>';
    }

    protected function addAttr(...$names): self
    {
        foreach ($names as $name) {
            if (!empty($this->$name)) {
                $this->parts[$name] = $this->$name;
            }
        }

        return $this;
    }
}