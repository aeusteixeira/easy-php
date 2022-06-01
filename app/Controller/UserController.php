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

    public function create()
    {
        $view = new View('site/users/create.phtml', [
            'title' => 'Criar usuário',
            'description' => 'Criar um novo usuário',
        ]);
        return $view->render();
    }

    public function store()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $user = new User();
            $data = $_POST;
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if($user->create($data)){
                header('Location: /users');
            }
        }
    }

}
