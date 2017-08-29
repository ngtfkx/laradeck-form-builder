<?php

use \Ngtfkx\Laradeck\FormBuilder\FormBuilder;

if (!function_exists('fb')) {
    /**
     * @return FormBuilder;
     */
    function fb()
    {
        $container = \Illuminate\Container\Container::getInstance();

        $instance = $container->make(FormBuilder::class);

        $container->instance(FormBuilder::class, $instance);

        return $instance;
    }
}