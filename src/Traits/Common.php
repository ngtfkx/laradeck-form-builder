<?php

namespace Ngtfkx\Laradeck\FormBuilder\Traits;


use Illuminate\Support\Collection;

trait Common
{
    /**
     * @var string $id Значение атрибута ID элемента
     */
    protected $id;

    /**
     * @var string $name Значение атрибута name элемента
     */
    protected $name;

    /**
     * @var Collection $classes Коллекция классом элемента
     */
    protected $classes;

    /**
     * @var Collection $attributes Коллекция дополнительных атрибутов элемента
     */
    protected $attributes;

    /**
     * @var Collection $styles Коллекция inline-стилей элемента
     */
    protected $styles;

    /**
     * Сеттер атрибута id элемента
     *
     * @param string $value
     * @return Common
     */
    public function id(string $value): self
    {
        $this->id = $value;

        return $this;
    }

    /**
     * Сеттер атрибута name элемента
     *
     * @param string $value
     * @return Common
     */
    public function name(string $value): self
    {
        $this->name = $value;

        return $this;
    }

    /**
     * Добавить элементу один или несколько классов
     *
     * @param array ...$classes
     * @return Common
     */
    public function class(...$classes): self
    {
        $this->classes($classes);

        return $this;
    }

    /**
     *  Добавить элементу один или несколько классов из массива
     *
     * @param iterable $classes
     * @return Common
     */
    public function classes(iterable $classes): self
    {
        foreach($classes as $class) {
            if(!$this->classes->contains($class)) {
                $this->classes->push($class);
            }
        }

        return $this;
    }

    /**
     * Добавить к элементу один или несколько inline-стилей
     *
     * @param string $key
     * @param string|null $value
     * @return Common
     */
    public function style(string $key, string $value = null): self
    {
        if (empty($value)) {
            $pos = strpos($key, ':', 2);
            if ($pos !== false) {
                $parts = explode(':', strrev($key));
                $key = strrev($parts[1]);
                $value = strrev($parts[0]);
            }
        }

        if ($key && $value) {
            $this->styles->put($key, $value);
        }

        return $this;
    }

    /**
     * Добавить к элементу один или несколько inline-стилей из массива
     *
     * @param iterable $styles
     * @return Common
     */
    public function styles(iterable $styles): self
    {
        foreach($styles as $key => $value) {
            $this->styles->put($key, $value);
        }

        return $this;
    }

    /**
     * Добавить аттрибут к элементу
     *
     * @param string $key
     * @param string|null $value
     * @return Common
     */
    public function attr(string $key, string $value = null): self
    {
        $this->attributes->put($key, $value);

        return $this;
    }

    /**
     * Добавить один или несколько атрибутов из массива к элементу
     *
     * @param iterable $attributes
     * @return Common
     */
    public function attrs(iterable $attributes): self
    {
        foreach($attributes as $key => $value) {
            if ($key === 'class') {
                $this->class($value);
            } else if($key === 'style') {
                $this->style($value);
            } else {
                $this->attributes->put($key, $value);
            }
        }

        return $this;
    }
}