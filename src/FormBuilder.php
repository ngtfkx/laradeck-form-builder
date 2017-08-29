<?php

namespace Ngtfkx\Laradeck\FormBuilder;


use Ngtfkx\Laradeck\FormBuilder\Elements;

class FormBuilder
{
    /**
     * @var bool Признак, что форма должна быть закрыта
     */
    protected $isClosed = false;

    /**
     * @var Elements\Form $form
     */
    protected $form;

    /**
     * FormBuilder constructor.
     */
    public function __construct()
    {

    }

    /**
     * Открыть форму
     *
     * @param string $action URL для отправки данных формы
     * @param string $method Метод отправки данных формы
     * @return Elements\Form
     */
    public function open(string $action, string $method = 'get'): Elements\Form
    {
        $this->form = (new Elements\Form())->action($action)->method($method);

        return $this->form;
    }

    /**
     * Закрыть форму
     *
     * @return FormBuilder
     */
    public function close(): FormBuilder
    {
        $this->isClosed = true;

        return $this;
    }

    /**
     * Создать элемент формы типа hidden
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Hidden
     */
    public function hidden(string $name = null, string $value = null): Elements\Hidden
    {
        return new Elements\Hidden($name, $value);
    }

    /**
     * Преобразовать в строку для вывода в HTML
     *
     * @return string
     */
    public function __toString()
    {
        return ($this->isClosed) ? '</form>' : '<form>';
    }
}