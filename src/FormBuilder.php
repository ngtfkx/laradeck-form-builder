<?php

namespace Ngtfkx\Laradeck\FormBuilder;


use Illuminate\Support\Collection;
use Ngtfkx\Laradeck\FormBuilder\Elements\Form;
use Ngtfkx\Laradeck\FormBuilder\Traits\Common;

class FormBuilder
{
    use Common;

    /**
     * @var string URL для отправки данных формы
     */
    protected $action = '';

    /**
     * @var string Метод отправки данных формы
     */
    protected $method = 'get';

    /**
     * @var bool Признак включения/отключения автозаполнения полей формы
     */
    protected $autocomplete = true;

    /**
     * @var bool Признак включения/откючения автовалидации перед отправкой данных
     */
    protected $novalidate = false;

    /**
     * @var string В каком окне открывать результат обработки формы
     */
    protected $target = '_self';

    /**
     * @var string Тип кодировки данных при отправке
     */
    protected $enctype = 'application/x-www-form-urlencoded';

    /**
     * @var bool Признак, что форма должна быть закрыта
     */
    protected $isClosed = false;

    /**
     * FormBuilder constructor.
     */
    public function __construct()
    {
        $this->classes = new Collection();

        $this->attributes = new Collection();

        $this->styles = new Collection();
    }

    /**
     * Открыть форму
     *
     * @param string $action URL для отправки данных формы
     * @param string $method Метод отправки данных формы
     * @return FormBuilder
     */
    public function open(string $action, string $method = 'get'): FormBuilder
    {
        $this->action = $action;

        $this->method = strtolower($method);

        $this->isClosed = false;

        return $this;
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
     * Сеттер для установки типа кодировки данных при отправке
     *
     * @param string $value
     * @return FormBuilder
     */
    protected function enctype(string $value): FormBuilder
    {
        $this->enctype = $value;

        return $this;
    }

    /**
     * Установить тип отправки данных multipart/form-data
     *
     * @return FormBuilder
     */
    public function multipart(): FormBuilder
    {
        return $this->enctype('multipart/form-data');
    }

    /**
     * Установить тип отправки данных text/plain
     *
     * @return FormBuilder
     */
    public function plain(): FormBuilder
    {
        return $this->enctype('text/plain');
    }

    /**
     * Установить тип отправки данных application/x-www-form-urlencoded
     *
     * @return FormBuilder
     */
    public function urlencoded (): FormBuilder
    {
        return $this->enctype('application/x-www-form-urlencoded');
    }

    /**
     * Сеттер для установки признака включения/отключения автозаполнения полей формы
     *
     * @param bool $state
     * @return FormBuilder
     */
    public function autocomplete(bool $state = true): FormBuilder
    {
        $this->autocomplete = $state;

        return $this;
    }

    /**
     * Сеттер для установки признака включения/отключения автовалидации перед отправкой данных
     *
     * @param bool $state
     * @return FormBuilder
     */
    public function novalidate(bool $state = true): FormBuilder
    {
        $this->novalidate = $state;

        return $this;
    }

    /**
     * Преобразовать в строку для вывода в HTML
     *
     * @return string
     */
    public function __toString()
    {
        if ($this->isClosed) {
            $html = '</form>';
        } else {
            $form = (new Form())
                ->id($this->id)
                ->name($this->name)
                ->attrs($this->attributes)
                ->attrs([
                    'action' => $this->action,
                    'method' => $this->method,
                    'enctype' => $this->enctype,
                    'autocomplete' => $this->autocomplete,
                    'novalidate' => $this->novalidate,
                ])
                ->styles($this->styles)
                ->classes($this->classes);

            $html = '' . $form;
        }

        return $html;
    }
}