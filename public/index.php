<?php
error_reporting(-1);
use vendor\core\Router;
use vendor\core\Controller;

$query = trim($_SERVER['QUERY_STRING'], '/');

define('BASE_URL', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core/');
define('LIBS', dirname(__DIR__) . '/vendor/libs/');
define('ROOT', dirname(__DIR__) . '/');
define('APP', dirname(__DIR__) . '/app/');
define('CONTROLLERS', '/app/controllers/');
define('MODELS', APP . '/models/');
define('VIEWS', APP . '/Views/');
define('LAYOUT', VIEWS . 'layouts/default.php');

spl_autoload_register(function($class) {
    $file = ROOT . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

require LIBS . 'helpers.php';
require APP . 'routes.php';



Router::dispatch($query);