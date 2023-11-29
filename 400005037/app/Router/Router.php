<?php

namespace App\Router;

use Framework\Router\RouterAbstract;
use Framework\Request\RequestAbstract;
use App\Controllers\IndexController;

class Router extends RouterAbstract {
    static public function route(RequestAbstract $request) {
        try {
            $route = Router::checkForURI($request);
            $controller = preg_split("/\./",$route['controller'])[0];
            $method = preg_split("/\./",$route['controller'])[1];
            $response = new $controller();
            $response->$method($request);
        } catch(\Exception $e) {
            printer($e->getMessage());
        }
    }

    static private function checkForURI(RequestAbstract $request) : array {
        if(isset(preg_split('/\?/',$request->uri)[1])) { //check for query string and change uri as needed
            $request->uri = preg_split('/\?/',$request->uri)[0];
        }
        foreach(Router::$routes as $route) {
            if($route['url'] === $request->uri && $route['method'] === $request->HTTPMethod) {
                return $route;
            }
        }
        throw new \Exception('Error 404 Route "'. $request->uri.'" Not Found');
    }

    static public function isEmpty() : bool {
        if(empty(self::$routes)) return true;
        return false;
    }

    static public function listRoutes() {
        return (object)self::$routes;
    }
}
