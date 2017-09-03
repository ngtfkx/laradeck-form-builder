<?php

namespace Ngtfkx\Laradeck\FormBuilder\Providers;


use Illuminate\Support\Collection;

abstract class AbstractProvider
{
    /**
     * @var string $cssFramework Тип верстки. Допустимые значения: html, bootstrap3, bootstrap4
     */
    protected $cssFramework;

    /**
     * @var string $orientation Тип верстки формы
     */
    protected $orientation;

    /**
     * @var string $formClasses Классы, которые надо назначить на форму
     */
    protected $formClasses = '';

    protected $commonClasses = '';

    protected $elementClasses;

    protected $orientationDir;

    public $skipCommonClassesForElements;

    abstract protected function setFormClasses();

    /**
     * AbstractLayout constructor.
     */
    public function __construct()
    {
        $this->elementClasses = new Collection($this->elementClasses);
    }

    public function orientation(?string $orientation = null): self
    {
        $this->orientation = $orientation;

        $this->setFormClasses();

        return $this;
    }

    public function getElementClasses(string $name): ?string
    {
        return $this->elementClasses->get($name);
    }

    public function getViewsDirPath(): string
    {
        return $this->cssFramework . '.' . $this->orientationDir;
    }

    public function getFormClasses(): string
    {
        return $this->formClasses;
    }

    public function getCommonClasses(): string
    {
        return $this->commonClasses;
    }

}