<?php

namespace Ngtfkx\Laradeck\FormBuilder\Layouts;


abstract class AbstractLayout
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

    protected $elementClasses = '';

    protected $orientationDir;

    abstract protected function setFormClasses();

    /**
     * AbstractLayout constructor.
     */
    public function __construct()
    {

    }

    public function orientation(?string $orientation = null): self
    {
        $this->orientation = $orientation;

        $this->setFormClasses();

        return $this;
    }

    public function getViewsDirPath(): string
    {
        return $this->cssFramework . '.' . $this->orientationDir;
    }

    public function getFormClasses(): string
    {
        return $this->formClasses;
    }

    public function getElementClasses(): string
    {
        return $this->elementClasses;
    }

}