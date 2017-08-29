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
     * @return Elements\Text\Text
     */
    public function text(string $name = null, string $value = null): Elements\Text\Text
    {
        return new Elements\Text\Text($name, $value);
    }

    /**
     * Создать элемент формы типа email
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Email
     */
    public function email(string $name = null, string $value = null): Elements\Text\Email
    {
        return new Elements\Text\Email($name, $value);
    }

    /**
     * Создать элемент формы типа password
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Password
     */
    public function password(string $name = null, string $value = null): Elements\Text\Password
    {
        return new Elements\Text\Password($name, $value);
    }

    /**
     * Создать элемент формы типа number
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Number
     */
    public function number(string $name = null, string $value = null): Elements\Text\Number
    {
        return new Elements\Text\Number($name, $value);
    }

    /**
     * Создать элемент формы типа tel
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Tel
     */
    public function tel(string $name = null, string $value = null): Elements\Text\Tel
    {
        return new Elements\Text\Tel($name, $value);
    }

    /**
     * Создать элемент формы типа color
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Color
     */
    public function color(string $name = null, string $value = null): Elements\Text\Color
    {
        return new Elements\Text\Color($name, $value);
    }

    /**
     * Создать элемент формы типа datetime
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Datetime
     */
    public function datetime(string $name = null, string $value = null): Elements\Text\Datetime
    {
        return new Elements\Text\Datetime($name, $value);
    }

    /**
     * Создать элемент формы типа date
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Date
     */
    public function date(string $name = null, string $value = null): Elements\Text\Date
    {
        return new Elements\Text\Date($name, $value);
    }

    /**
     * Создать элемент формы типа range
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Range
     */
    public function range(string $name = null, string $value = null): Elements\Text\Range
    {
        return new Elements\Text\Range($name, $value);
    }

    /**
     * Создать элемент формы типа search
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Search
     */
    public function search(string $name = null, string $value = null): Elements\Text\Search
    {
        return new Elements\Text\Search($name, $value);
    }

    /**
     * Создать элемент формы типа time
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Time
     */
    public function time(string $name = null, string $value = null): Elements\Text\Time
    {
        return new Elements\Text\Time($name, $value);
    }

    /**
     * Создать элемент формы типа url
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Url
     */
    public function url(string $name = null, string $value = null): Elements\Text\Url
    {
        return new Elements\Text\Url($name, $value);
    }

    /**
     * Создать элемент формы типа month
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Month
     */
    public function month(string $name = null, string $value = null): Elements\Text\Month
    {
        return new Elements\Text\Month($name, $value);
    }

    /**
     * Создать элемент формы типа week
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Text\Week
     */
    public function week(string $name = null, string $value = null): Elements\Text\Week
    {
        return new Elements\Text\Week($name, $value);
    }

    /**
     * Создать элемент формы типа submit
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Submit\Submit
     */
    public function submit(string $name = null, string $value = null): Elements\Submit\Submit
    {
        return new Elements\Submit\Submit($name, $value);
    }

    /**
     * Создать элемент формы типа reset
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Submit\Reset
     */
    public function reset(string $name = null, string $value = null): Elements\Submit\Reset
    {
        return new Elements\Submit\Reset($name, $value);
    }

    /**
     * Создать элемент формы типа button
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Area\Button
     */
    public function button(string $name = null, string $value = null): Elements\Area\Button
    {
        return new Elements\Area\Button($name, $value);
    }

    /**
     * Создать элемент формы типа textarea
     *
     * @param string|null $name
     * @param string|null $value
     * @return Elements\Area\Textarea
     */
    public function textarea(string $name = null, string $value = null): Elements\Area\Textarea
    {
        return new Elements\Area\Textarea($name, $value);
    }

    /**
     * Создать элемент формы типа file
     *
     * @param string|null $name
     * @return Elements\File\File
     */
    public function file(string $name = null): Elements\File\File
    {
        return new Elements\File\File($name);
    }

    /**
     * Создать элемент формы типа image
     *
     * @param string|null $name
     * @return Elements\File\Image
     */
    public function image(string $name = null): Elements\File\Image
    {
        return new Elements\File\Image($name);
    }

    /**
     * Создать элемент формы типа checkbox
     *
     * @param string|null $name
     * @param string|null $value
     * @param bool|null $state
     * @return Elements\Checked\Checkbox
     */
    public function checkbox(string $name = null, ?string $value = '1', ?bool $state = false): Elements\Checked\Checkbox
    {
        return new Elements\Checked\Checkbox($name, $value, $state);
    }

    /**
     * Создать элемент формы типа radio
     *
     * @param string|null $name
     * @param string|null $value
     * @param bool|null $state
     * @return Elements\Checked\Radio
     */
    public function radio(string $name = null, ?string $value = '1', ?bool $state = false): Elements\Checked\Radio
    {
        return new Elements\Checked\Radio($name, $value, $state);
    }

    /**
     * Создать элемент формы типа select
     *
     * @param string|null $name
     * @param string|null $value
     * @param iterable|null $options
     * @return Elements\Select
     */
    public function select(string $name = null, string $value = null, ?iterable $options = null): Elements\Select
    {
        return new Elements\Select($name, $value, $options);
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