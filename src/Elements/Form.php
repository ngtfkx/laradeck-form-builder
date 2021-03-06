<?php

namespace Ngtfkx\Laradeck\FormBuilder\Elements;


use Ngtfkx\Laradeck\FormBuilder\Providers\AbstractProvider;

class Form extends AbstractElement
{
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
    protected $autocomplete;

    /**
     * @var bool Признак включения/откючения автовалидации перед отправкой данных
     */
    protected $novalidate;

    /**
     * @var string В каком окне открывать результат обработки формы
     */
    protected $target;

    /**
     * @var string Тип кодировки данных при отправке
     */
    protected $enctype;

    public $onlyTagRender = true;

    /**
     * Form constructor.
     * @param AbstractProvider $layout
     */
    public function __construct(?AbstractProvider $layout = null)
    {
        parent::__construct();

        $this->layout = $layout;
    }

    /**
     * @param string|null $value
     * @return Form
     */
    public function action(?string $value = ''): Form
    {
        $this->action = $value;

        return $this;
    }

    /**
     * @param string|null  $value
     * @return Form
     */
    public function method(?string $value): Form
    {
        $this->method = $value;

        return $this;
    }

    /**
     * Сеттер для установки типа кодировки данных при отправке
     *
     * @param string $value
     * @return Form
     */
    protected function enctype(string $value): Form
    {
        $this->enctype = $value;

        return $this;
    }

    /**
     * Сеттер для установки указания в каком окнеоткрывать результат работы
     *
     * @param string|null $value
     * @return Form
     */
    public function target(?string $value): Form
    {
        $this->target = $value;

        return $this;
    }

    /**
     * Установить тип отправки данных multipart/form-data
     *
     * @return Form
     */
    public function multipart(): Form
    {
        return $this->enctype('multipart/form-data');
    }

    /**
     * Установить тип отправки данных text/plain
     *
     * @return Form
     */
    public function plain(): Form
    {
        return $this->enctype('text/plain');
    }

    /**
     * Установить тип отправки данных application/x-www-form-urlencoded
     *
     * @return Form
     */
    public function urlencoded(): Form
    {
        return $this->enctype('application/x-www-form-urlencoded');
    }

    /**
     * Сеттер для установки признака включения/отключения автозаполнения полей формы
     *
     * @param bool|null $state
     * @return Form
     */
    public function autocomplete(?bool $state = true): Form
    {
        $this->autocomplete = $state;

        return $this;
    }

    /**
     * Сеттер для установки признака включения/отключения автовалидации перед отправкой данных
     *
     * @param bool|null $state
     * @return Form
     */
    public function novalidate(?bool $state = true): Form
    {
        $this->novalidate = $state;

        return $this;
    }

    public function tag(): void
    {
        $this->tag = 'form';
    }

    public function __toString(): string
    {
        if ($this->layout) {
            $this->class($this->layout->getFormClasses());
        }

        $this->attrs([
                'action' => $this->action,
                'method' => $this->method,
                'target' => $this->target,
                'enctype' => $this->enctype,
                'autocomplete' => $this->autocomplete,
                'novalidate' => $this->novalidate,
            ]);

        return parent::__toString();
    }
}