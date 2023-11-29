<?php

require_once "C:/COMP3385_Assigment_2/400005037/config/config.php";
use App\Request\AuthRequest;
use App\Router\Router;
use App\Auth\Auth;

Auth::startSession();
if(null !== Auth::$session->user()) {
    header('Location:./dashboard');
}


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Try Again <a href="./Auth">Click Here</a><br><br>';
    echo 'Return to the Index Page: <a href="./">Index Page</a>';
} else {
    Router::addRoute(['url' => '/Auth', 'controller' => 'AuthController.index', 'method' => 'GET', ]);
    Router::route(new AuthRequest());
}

