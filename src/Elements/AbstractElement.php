<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


use Illuminate\Support\Collection;
use Ngtfkx\Laradeck\FormBuilder\Traits;

abstract class AbstractElement
{
    use Traits\Common;

    /**
     * Значение элемента
     *
     * @var string
     */
    protected $value;

    /**
     * Тег элемента
     *
     * @var string
     */
    protected $tag;

    /**
     * Набор атрибутов для генерации html-кода элементов
     *
     * @var Collection
     */
    protected $parts;

    /**
     * @return void
     */
    abstract public function tag();

    public function __construct()
    {
        $this->classes = new Collection();

        $this->attributes = new Collection();

        $this->styles = new Collection();

        $this->parts = new Collection();

        $this->tag();
    }

    /**
     * Сеттер значения элемента
     *
     * @param $value
     * @return AbstractElement
     */
    public function value($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Преобразовать в строку для вывода в HTML
     *
     * @return string
     */
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

        $this->parts = new Collection();

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