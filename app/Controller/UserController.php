<?php

namespace App\Controller;

use App\Models\User;
use Exception;
use App\View\View;

class UserController
{
    public function index($id)
    {
        $user = new User();
        $view = new View('site/users/index.phtml', [
            'title' => 'Usuários',
            'description' => 'Usuários do sistema',
            'users' => $user->all(),
        ]);
        return $view->render();
    }

    public function show($id)
    {
        $user = new User();
        $data = $user->update([
            'id' => 1,
            'email' => 'asdasdas@joao.com'
        ]);

        var_dump($data);
    }

}
