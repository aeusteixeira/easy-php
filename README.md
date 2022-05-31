
![Logo](https://i.ibb.co/XynJbg7/easy-php.png)


# Easy PHP

Easy PHP é um microframework escrito em PHP com o objetivo de ser utilizado em sites simples

## Variáveis de Ambiente

Para rodar um banco de dados em seu projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

`DB_HOST`

`DB_USER`

`DB_PASS`

`DB_DATABASE`

## Uso/Rotas
No arquivo routes.php dentro do diretório config, faça a declaração das suas rotas publicas

```php
define('HOME', '/');
define('ABOUT', 'about');
define('CONTACT', 'contact');
```

Para chamar a rota em seu arquivo, utilize a função route(), passando como parametro a rota definida

```html
<li class="nav-item">
    <a class="nav-link" href="<?php route(ABOUT) ?>">Sobre</a>
</li>
```


## Uso/Model
O Easy PHP possui já possui alguns métodos simples implementados. Você pode escrever seus proprios métodos dentro do arquivo Database/Database.php

O Easy PHP segue o padrão MVC, portanto caso você utilize o models em sua aplicação, crie seus arquivos modelos dentro do diretório Models. Exemplo: User.php

```php
<?php

namespace App\Models;
use App\Database\DataBase;

class User extends Database{
    protected $table = 'users';
}
```
### All
Retorna todos os dados de uma tabela
```php
$user = new User();
$user->all();
```

### Find

O método find() irá retornar um array associativo com os dados da tabela do model indicado

```php
$user = new User();
$user->find($id);
```

### Where
O método where() irá retornar um array associativo com os dados da tabela do model indicado com os dados filtrados pelas condições indicadas na condição

```php
$user = new User();
$user->where([
    'email' => 'contato.matheusteixeira@gmail.com'
]);
```

### Create
O método create() irá criar um dado na tabela indicada

```php
$user = new User();
$user->create([
    'name' => 'Matheus Teixeira',
    'email' => 'contato.matheusteixeira@gmail.com',
    'password' => 'kka$Oji&qFF7H6'
]);
```

### Update
O método update() irá atualizar um dado na tabela indicada
```php
$user = new User();
$user->update([
    'name' => 'Matheus Teixeira dos Santos',
    'email' => 'contato.matheusteixeira@hotmail.com',
    'password' => 'kka$Oji&qFF7H6'
]);
```

### Delete
O método delete() irá deletar um dado na tabela indicada
```php
$user = new User();
$user->delete(1);
```

## Uso/Views

As Views devem ser armazenadas em views. Para retornar uma view a partir de um controller
```php
<?php
use App\View\View;

class UserController
{
    public function show($id)
    {
        $user = new User();
        $view = new View('site/users/index.phtml', [
            'user' => $user->find($id),
        ]);
        return $view->render();
    }
}
```
## FAQ

#### Posso usar para projetos complexos?

No momento, não recomendo. Ainda está em desenvolvimento.
## Suporte

Para suporte, mande um email para contato.matheusteixeira@gmail.com


## Autores

- [@aeusteixeira](https://www.github.com/aeusteixeira)


## Etiquetas

Adicione etiquetas de algum lugar, como: [shields.io](https://shields.io/)

[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/tterb/atomic-design-ui/blob/master/LICENSEs)
