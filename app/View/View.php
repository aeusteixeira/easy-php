<?php

namespace App\View;

use Exception;

class View
{
    private $view;
    private $data;

    public function __construct($view = null, $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function render()
    {
        ob_start();

        require VIEW_PATH . $this->view;

        return ob_get_clean();
    }
}
