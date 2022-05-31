<?php

namespace App\Controller;

use Exception;
use App\View\View;

class AboutController
{
    public function index($id)
    {
        $view = new View('site/about.phtml');
        $view->title = 'Sobre nós';
        $view->description = 'Descrição da página sobre nós';
        return $view->render();
    }
}
