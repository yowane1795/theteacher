<?php

class Route 
{
    private static $routes = [];

    public static function get(string $path, $action)
    {
        $route = new Request($path, $action);
        self::$routes['GET'][] = $route;
        return $route;
    }

    public static function post(string $path, $action)
    {
        $route = new Request($path, $action);
        self::$routes['POST'][] = $route;
        return $route;
    }

    public static function run()
    {
        foreach (self::$routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match(trim($_GET['url'], '/')))
            {
                return $route->execute();
            }
        }

        throw new \Exception("Error Pages Not Found");
        
    }
}
