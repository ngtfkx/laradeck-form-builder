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

    abstract protected function setFormClasses();

    /**
     * AbstractLayout constructor.
     * @param string $cssFramework
     * @param string $orientation
     */
    public function __construct(string $cssFramework = 'html', ?string $orientation = null)
    {
        $this->cssFramework = $cssFramework;
        $this->orientation($orientation);
    }

    public function orientation(?string $orientation = null): self
    {
        $this->orientation = $orientation;

        $this->setFormClasses();

        return $this;
    }

    public function getFormClasses(): string
    {
        return $this->formClasses;
    }

}