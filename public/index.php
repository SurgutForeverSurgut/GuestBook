<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('BASE_URL', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core/');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app/');
define('CONTROLLERS', APP . '/controllers/');
define('MODELS', APP . '/models/');
define('VIEWS', APP . '/views/');

require '../vendor/core/Router.php';
require '../vendor/libs/helpers.php';

spl_autoload_register(function($class) {
    $file = CONTROLLERS . "$class.php";
    if(is_file($file)){
        require_once $file;
    }
});

// Router::add('/', 'MainController@index');
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);