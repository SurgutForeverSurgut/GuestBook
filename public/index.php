<?php

$query = trim($_SERVER['QUERY_STRING'], '/');

define('BASE_URL', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core/');
define('LIBS', dirname(__DIR__) . '/vendor/libs/');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app/');
define('CONTROLLERS', APP . '/controllers/');
define('MODELS', APP . '/models/');
define('VIEWS', APP . '/views/');

require CORE . 'Router.php';
require LIBS . 'helpers.php';
require APP . 'routes.php';

spl_autoload_register(function($class) {
    $file = CONTROLLERS . "$class.php";
    if(is_file($file)){
        require_once $file;
    }
});
Router::dispatch($query);