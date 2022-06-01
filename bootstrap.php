<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/routes.php';
//require __DIR__ . '/way';

define('VIEW_PATH', __DIR__ . '/views/');
define('ROOT_PATH', dirname(__FILE__));

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();