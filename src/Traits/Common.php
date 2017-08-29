<?php

namespace Ngtfkx\Laradeck\FormBuilder\Traits;


use Illuminate\Support\Collection;

trait Common
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Collection
     */
    protected $classes;

    /**
     * @var Collection
     */
    protected $attributes;

    /**
     * @var Collection
     */
    protected $styles;

    public function id($value): self
    {
        $this->id = $value;

        return $this;
    }

    public function name($value): self
    {
        $this->name = $value;

        return $this;
    }

    public function class(...$classes): self
    {
        foreach($classes as $class) {
            if(!$this->classes->contains($class)) {
                $this->classes->push($class);
            }
        }

        return $this;
    }

    public function classes(iterable $classes): self
    {
        foreach($classes as $class) {
            if(!$this->classes->contains($class)) {
                $this->classes->push($class);
            }
        }

        return $this;
    }

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

    public function styles(iterable $styles): self
    {
        foreach($styles as $key => $value) {
            $this->styles->put($key, $value);
        }

        return $this;
    }

    public function attr(string $key, string $value = null): self
    {
        $this->attributes->put($key, $value);

        return $this;
    }

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