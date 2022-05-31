<?php

namespace App\Controller;

use Exception;
use App\View\View;

class ContactController
{
    public function index($id)
    {
        $view = new View('site/contact.phtml');
        $view->title = 'Contato';
        $view->description = 'Entre em contato conosco';
        return $view->render();
    }
}
