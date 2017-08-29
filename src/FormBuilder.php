<?php

namespace Ngtfkx\Laradeck\FormBuilder;


use Illuminate\Support\Collection;
use Ngtfkx\Laradeck\FormBuilder\Elements\Form;
use Ngtfkx\Laradeck\FormBuilder\Traits\Common;

class FormBuilder
{
    use Common;

    /**
     * @var string
     */
    protected $action = '';

    /**
     * @var string
     */
    protected $method = 'get';

    /**
     * @var bool
     */
    protected $autocomplete = true;

    /**
     * @var bool
     */
    protected $novalidate = false;

    /**
     * @var string
     */
    protected $target = '_self';

    /**
     * @var string
     */
    protected $enctype = 'application/x-www-form-urlencoded';

    /**
     * @var bool
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

    public function open($action, $method = 'get'): FormBuilder
    {
        $this->action = $action;

        $this->method = strtolower($method);

        $this->isClosed = false;

        return $this;
    }

    public function close(): FormBuilder
    {
        $this->isClosed = true;

        return $this;
    }

    protected function enctype($value): FormBuilder
    {
        $this->enctype = $value;

        return $this;
    }

    public function multipart(): FormBuilder
    {
        return $this->enctype('multipart/form-data');
    }

    public function plain(): FormBuilder
    {
        return $this->enctype('text/plain');
    }

    public function urlencoded (): FormBuilder
    {
        return $this->enctype('application/x-www-form-urlencoded');
    }

    public function autocomplete(bool $state = true): FormBuilder
    {
        $this->autocomplete = $state;

        return $this;
    }

    public function novalidate(bool $state = true): FormBuilder
    {
        $this->novalidate = $state;

        return $this;
    }

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