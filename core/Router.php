<?php

    namespace core;
    class Router 
    {
        protected static array $routes = [];
        protected static array $route = [];

        private static function parseRoute($url) 
        {
            foreach(self::$routes as $uri => &$controller){
                if($uri === $url){
                    $partController = explode('@', $controller);
                    self::$route['controller'] = $partController[0];
                    self::$route['action'] = $partController[1];
                    return true;
                }
            }
            return false;
        }

        public static function add($regexp, string $route) 
        {
            $regexp = trim($regexp, '/');
            self::$routes[$regexp] = $route;
        }

        public static function getRoutes() 
        {
            return self::$routes;
        }

        public static function getRoute() 
        {
            return self::$route;
        }

        public static function dispatch() 
        {
            $url = trim($_SERVER['QUERY_STRING'], '/');

            if (self::parseRoute($url)) {
                $controllerName = 'app\\controllers\\' . self::$route['controller'];
                if (class_exists($controllerName)) {
                    $controller = new $controllerName(self::$route);

                    $actionName = self::$route['action'];
                    if (method_exists($controller, $actionName)) {
                        $controller->$actionName();
                    } else {
                        echo "метод $actionName не найден";
                    }
                } else {
                    echo "контроллер $controllerName не найден";
                }
                
            } else {
                http_response_code(404);
                include '404.php';
            }
            
        }

        public static function get($var = null)
        {
            if(isset($_GET[$var])){
                return $_GET[$var];
            }
            return $_GET;
        }

        public static function post($var = null)
        {
            if(isset($_POST[$var])){
                return $_POST[$var];
            }
            return $_POST;
        }
        
    }
