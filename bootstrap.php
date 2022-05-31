<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/routes.php';

define('VIEW_PATH', __DIR__ . '/views/');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();