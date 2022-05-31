<?php
require __DIR__ . '/../bootstrap.php';

$url = substr($_SERVER['REQUEST_URI'], 1);
$url = explode('/', $url);

$controller = isset($url[0]) ? $url[0] : 'index';
$action = isset($url[1]) ? $url[1] : 'index';
$param = isset($url[2]) ? $url[2] : null;

if(!class_exists($controller = "App\Controller\\" . ucfirst($controller) . 'Controller')){
    die('404 - Page not found');
}

if(!method_exists($controller, $action)){
    $action = 'show';
    $param = $url[1];
}

print call_user_func_array([new $controller, $action], [$param]);
