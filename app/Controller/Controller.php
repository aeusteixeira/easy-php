<?php

namespace App\Controller;

use App\Models\User;
use App\View\View;

class Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $view = new View('site/index.phtml');
        return $view->render();
    }

}