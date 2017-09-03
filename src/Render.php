<?php

namespace Ngtfkx\Laradeck\FormBuilder;


use Ngtfkx\Laradeck\FormBuilder\Elements\AbstractElement;

class Render
{
    /**
     * @var $element AbstractElement
     */
    protected $element;

    /**
     * Render constructor.
     * @param AbstractElement $element
     */
    public function __construct(AbstractElement $element)
    {
        $this->element = $element;
    }

    /**
     * Преобразовать в строку для вывода в HTML
     *
     * @return string
     */
    public function __toString(): string
    {
        $this->element->beforeCommonPrepareToRender();

        $this->element->beforeElementPrepareToRender();

        $this->element->parts->put('class', $this->generateClasses());

        $this->element->parts->put('style', $this->generateStyles());

        foreach ($this->element->attributes as $key => $value) {
            $this->element->parts->put($key, $value);
        }

        $this->element->afterCommonPrepareToRender();

        $this->element->afterElementPrepareToRender();

        return $this->render();
    }

    protected function render(): string
    {
        $attributes = $this->generateParts();

        $tag = $this->element->getTagHtml();

        $tag = str_replace('**attributes**', $attributes, $tag);

        if (is_null($this->element->layout) === false) {
            $views = [
                'fb::' . $this->element->layout->getViewsDirPath() . '.' . $this->element->getClassName(),
                'fb::' . $this->element->layout->getViewsDirPath() . '.base',
            ];
            foreach ($views as $view) {
                if (view()->exists($view) && $this->element->onlyTagRender === false) {
                    $data = [
                        'id' => $this->element->parts->get('id'),
                        'help' => $this->element->help,
                        'label' => $this->element->label,
                        'tag' => $tag,
                        'value' => $this->element->value,
                        'class' => $this->generateClasses(),
                        'style' => $this->generateStyles(),
                        'attributes' => $this->generateAttributes(),
                        'fieldName' => $this->element->attributes->get('name'),
                    ];

                    return view($view, $data);
                }
            }
        }

        return $tag;
    }

    protected function generateClasses(): string
    {
        $string = $this->element->classes->implode(' ');

        return $string;
    }

    protected function generateStyles(): string
    {
        $string = $this->element->styles->pipe(function ($styles) {
            $attribute = '';
            foreach ($styles as $key => $value) {
                $attribute .= $key . ':' . $value . ';';
            }

            return $attribute;
        });

        return $string;
    }

    protected function generateAttributes(): string
    {
        $string = '';

        foreach ($this->element->attributes as $key => $value) {
            if (is_null($value) || (is_bool($value) && $value === false)) {
                continue;
            }

            $string .= ' ' . $key . '="' . (is_bool($value) ? $key : $value) . '"';
        }

        return $string;
    }

    protected function generateParts(): string
    {
        $attributes = '';

        foreach ($this->element->parts as $key => $value) {
            if (empty($value) || (is_bool($value) && $value === false)) {
                continue;
            }

            $attributes .= ' ' . $key . '="' . (is_bool($value) ? $key : $value) . '"';
        }

        return $attributes;
    }
}