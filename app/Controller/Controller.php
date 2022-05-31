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
        $view = new View('site/index.phtml', [
            'title' => 'Home',
            'description' => 'This is the home page',
        ]);
        return $view->render();
    }

}