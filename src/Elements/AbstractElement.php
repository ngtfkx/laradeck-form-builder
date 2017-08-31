<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


use Illuminate\Support\Collection;
use Ngtfkx\Laradeck\FormBuilder\Layouts\AbstractLayout;
use Ngtfkx\Laradeck\FormBuilder\Render;

abstract class AbstractElement
{
    /**
     * @var Collection|iterable $classes Коллекция классом элемента
     */
    public $classes;

    /**
     * @var Collection|iterable $attributes Коллекция дополнительных атрибутов элемента
     */
    public $attributes;

    /**
     * @var Collection|iterable $styles Коллекция inline-стилей элемента
     */
    public $styles;

    /**
     * @var string $value Значение элемента
     */
    public $value;

    /**
     * @var string $tag Тег элемента
     */
    protected $tag;

    /**
     * @var Collection|iterable $parts Набор атрибутов для генерации html-кода элементов
     */
    public $parts;

    /**
     * @var string $label
     */
    public $label;

    /**
     * @var string $help
     */
    public $help;

    /**
     * @var AbstractLayout
     */
    public $layout;

    public $onlyTagRender = false;

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

    public function layout(?AbstractLayout $layout): self
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Сеттер значения лейбла для элемента
     *
     * @param string|null $value
     * @return AbstractElement
     */
    public function label(?string $value): self
    {
        $this->label = $value;

        return $this;
    }

    /**
     * Сеттер значения подсказки для элемента
     *
     * @param string|null $value
     * @return AbstractElement
     */
    public function help(?string $value): self
    {
        $this->help = $value;

        return $this;
    }

    /**
     * Сеттер значения элемента
     *
     * @param string|null $value
     * @return AbstractElement
     */
    public function value(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Сеттер атрибута id элемента
     *
     * @param string|null $value
     * @return AbstractElement
     */
    public function id(?string $value): self
    {
        $this->attr('id', $value);

        return $this;
    }

    /**
     * Сеттер атрибута name элемента
     *
     * @param string|null $value
     * @return AbstractElement
     */
    public function name(?string $value): self
    {
        $this->attr('name', $value);

        return $this;
    }

    /**
     * Добавить элементу один или несколько классов
     *
     * @param array ...$classes
     * @return AbstractElement
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
     * @return AbstractElement
     */
    public function classes(iterable $classes): self
    {
        foreach ($classes as $class) {
            if (!$this->classes->contains($class)) {
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
     * @return AbstractElement
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
     * @return AbstractElement
     */
    public function styles(iterable $styles): self
    {
        foreach ($styles as $key => $value) {
            $this->styles->put($key, $value);
        }

        return $this;
    }

    /**
     * Добавить аттрибут к элементу
     *
     * @param string $key
     * @param string|null $value
     * @return AbstractElement
     */
    public function attr(string $key, $value = null): self
    {
        $this->attributes->put($key, $value);

        return $this;
    }

    /**
     * Добавить один или несколько атрибутов из массива к элементу
     *
     * @param iterable $attributes
     * @return AbstractElement
     */
    public function attrs(iterable $attributes): self
    {
        foreach ($attributes as $key => $value) {
            if ($key === 'class') {
                $this->class($value);
            } else if ($key === 'style') {
                $this->style($value);
            } else {
                $this->attributes->put($key, $value);
            }
        }

        return $this;
    }

    /**
     * Очистить классы элемента
     *
     * @return AbstractElement
     */
    public function clearClasses(): self
    {
        $this->classes = new Collection();

        return $this;
    }

    /**
     * Очистить классы стили
     *
     * @return AbstractElement
     */
    public function clearStyles(): self
    {
        $this->styles = new Collection();

        return $this;
    }

    /**
     * Очистить классы атрибуты
     *
     * @return AbstractElement
     */
    public function clearAttributes(): self
    {
        $this->attributes = new Collection();

        return $this;
    }

    public function getTagHtml()
    {
        return '<' . $this->tag . '**attributes**>';
    }

    public function beforeToParts(): void
    {
        $this->addAttr('value');

        if (is_null($this->layout) === false && $this->layout->getElementClasses() && !in_array($this->getClassName(), $this->layout->skipElementClasses)) {
            $this->class($this->layout->getElementClasses());
        }
    }

    public function afterToParts(): void
    {
        if($this->parts->has('id') === false) {
            $this->parts->put('id', str_random(20));
        }
    }

    public function getClassName($strToLower = false): string
    {
        return $strToLower ? class_basename($this) : strtolower(class_basename($this));
    }

    /**
     * Преобразовать в строку для вывода в HTML
     *
     * @return string
     */
    public function __toString(): string
    {
        return new Render($this);
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

    protected function addAttrAs(...$names): self
    {
        foreach ($names as $name) {
            if (!empty($this->$name)) {
                $this->parts[$name] = $name;
            }
        }

        return $this;
    }
}