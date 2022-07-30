<?php
    class Router 
    {
        protected static $routes = [];
        protected static $route = [];

        public static function add($regexp, $route = []) {
            self::$routes[$regexp] = $route;
        }

        public static function getRoutes() {
            return self::$routes;
        }

        public static function getRoute() {
            return self::$route;
        }

        public static function parseRoute($url) {
            foreach(self::$routes as $pattern => &$route){
                if(preg_match("#$pattern#i", $url, $matches)){
                    foreach($matches as $key => $value){
                        if(is_string($key)){
                            $route[$key] = $value;
                        }
                    }
                    $route['action'] ??= 'index';
                    self::$route = $route;
                    return true;
                }
            }
            return false;
        }

        public static function dispatch($url) {
            if (self::parseRoute($url)) {
                $controllerName = self::$route['controller'] . 'Controller';
                if (class_exists($controllerName)) {
                    $controller = new $controllerName;

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

        

        
    }
