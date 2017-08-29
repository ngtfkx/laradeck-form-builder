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
     * Создать элемент формы типа text
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text
     */
    public function text(string $name = null, string $value = null): Elements\Text
    {
        return new Elements\Text($name, $value);
    }

    /**
     * Создать элемент формы типа email
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Email
     */
    public function email(string $name = null, string $value = null): Elements\Email
    {
        return new Elements\Email($name, $value);
    }

    /**
     * Создать элемент формы типа password
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Password
     */
    public function password(string $name = null, string $value = null): Elements\Password
    {
        return new Elements\Password($name, $value);
    }

    /**
     * Создать элемент формы типа number
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Number
     */
    public function number(string $name = null, string $value = null): Elements\Number
    {
        return new Elements\Number($name, $value);
    }

    /**
     * Создать элемент формы типа tel
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Tel
     */
    public function tel(string $name = null, string $value = null): Elements\Tel
    {
        return new Elements\Tel($name, $value);
    }

    /**
     * Создать элемент формы типа color
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Color
     */
    public function color(string $name = null, string $value = null): Elements\Color
    {
        return new Elements\Color($name, $value);
    }

    /**
     * Создать элемент формы типа datetime
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Datetime
     */
    public function datetime(string $name = null, string $value = null): Elements\Datetime
    {
        return new Elements\Datetime($name, $value);
    }

    /**
     * Создать элемент формы типа date
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Tel
     */
    public function date(string $name = null, string $value = null): Elements\Date
    {
        return new Elements\Date($name, $value);
    }

    /**
     * Создать элемент формы типа range
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Range
     */
    public function range(string $name = null, string $value = null): Elements\Range
    {
        return new Elements\Range($name, $value);
    }

    /**
     * Создать элемент формы типа search
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Search
     */
    public function search(string $name = null, string $value = null): Elements\Search
    {
        return new Elements\Search($name, $value);
    }

    /**
     * Создать элемент формы типа time
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Time
     */
    public function time(string $name = null, string $value = null): Elements\Time
    {
        return new Elements\Time($name, $value);
    }

    /**
     * Создать элемент формы типа url
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Url
     */
    public function url(string $name = null, string $value = null): Elements\Url
    {
        return new Elements\Url($name, $value);
    }

    /**
     * Создать элемент формы типа month
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Month
     */
    public function month(string $name = null, string $value = null): Elements\Month
    {
        return new Elements\Month($name, $value);
    }

    /**
     * Создать элемент формы типа week
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Week
     */
    public function week(string $name = null, string $value = null): Elements\Week
    {
        return new Elements\Week($name, $value);
    }

    /**
     * Создать элемент формы типа submit
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Submit
     */
    public function submit(string $name = null, string $value = null): Elements\Submit
    {
        return new Elements\Submit($name, $value);
    }

    /**
     * Создать элемент формы типа reset
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Reset
     */
    public function reset(string $name = null, string $value = null): Elements\Reset
    {
        return new Elements\Reset($name, $value);
    }

    /**
     * Создать элемент формы типа button
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Button
     */
    public function button(string $name = null, string $value = null): Elements\Button
    {
        return new Elements\Button($name, $value);
    }

    /**
     * Создать элемент формы типа textarea
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Textarea
     */
    public function textarea(string $name = null, string $value = null): Elements\Textarea
    {
        return new Elements\Textarea($name, $value);
    }

    /**
     * Создать элемент формы типа file
     *
     * @param string|null $name
     * @return Elements\File
     */
    public function file(string $name = null): Elements\File
    {
        return new Elements\File($name);
    }

    /**
     * Создать элемент формы типа image
     *
     * @param string|null $name
     * @return Elements\Image
     */
    public function image(string $name = null): Elements\Image
    {
        return new Elements\Image($name);
    }

    /**
     * Создать элемент формы типа checkbox
     *
     * @param string|null $name
     * @param string|null $value
     * @param bool|null $state
     * @return Elements\Checkbox
     */
    public function checkbox(string $name = null, ?string $value = '1', ?bool $state = false): Elements\Checkbox
    {
        return new Elements\Checkbox($name, $value, $state);
    }

    /**
     * Создать элемент формы типа radio
     *
     * @param string|null $name
     * @param string|null $value
     * @param bool|null $state
     * @return Elements\Radio
     */
    public function radio(string $name = null, ?string $value = '1', ?bool $state = false): Elements\Radio
    {
        return new Elements\Radio($name, $value, $state);
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