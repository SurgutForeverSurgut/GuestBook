<?php
    class Router 
    {
        protected static $routes = [];
        protected static $route = [];

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

        public static function dispatch($url) 
        {
            if (self::parseRoute($url)) {
                $controllerName = self::$route['controller'];
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
