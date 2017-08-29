<?php

namespace Ngtfkx\Laradeck\FormBuilder;


use Ngtfkx\Laradeck\FormBuilder\Elements\Form;

class FormBuilder
{
    /**
     * @var bool Признак, что форма должна быть закрыта
     */
    protected $isClosed = false;

    /**
     * @var Form $form
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
     * @return FormBuilder
     */
    public function open(string $action, string $method = 'get'): Form
    {
        $this->form = (new Form())->action($action)->method($method);

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
     * Преобразовать в строку для вывода в HTML
     *
     * @return string
     */
    public function __toString()
    {
        return ($this->isClosed) ? '</form>' : '<form>';
    }
}