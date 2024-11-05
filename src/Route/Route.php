<?php

namespace App\Route;

class Route
{
    private static array $routes = [];

    public static function get(string $uri, array $action): void
    {
        self::$routes['GET'][$uri] = $action;
    }

    public static function post(string $uri, array $action): void
    {
        self::$routes['POST'][$uri] = $action;
    }

    public static function resolve(string $uri, string $method): void
    {
        $action = self::$routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo "404 - Not Found";
            exit;
        }

        [$controller, $method] = $action;
        if (class_exists($controller) && method_exists($controller, $method)) {
            (new $controller())->$method($_POST);
        } else {
            http_response_code(500);
            echo "Error: Controller or method not found";
        }
    }
}
