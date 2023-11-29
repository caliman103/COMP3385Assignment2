<?php

require_once "C:/COMP3385_Assigment_2/400005037/config/config.php";
use App\Request\IndexRequest;
use App\Router\Router;
use App\Auth\Auth;


Auth::startSession();
if(null !== Auth::$session->user()) {
    header('Location:./dashboard');
}

//Index Page
Router::addRoute(['url' => '/', 'controller' => 'IndexController.index', 'method' => 'GET', ]);
Router::addRoute(['url' => '/', 'controller' => 'IndexController.login', 'method' => 'POST', ]);
Router::addRoute(['url' => '/index', 'controller' => 'IndexController.index', 'method' => 'GET', ]);
Router::addRoute(['url' => '/index', 'controller' => 'IndexController.login', 'method' => 'POST', ]);

Router::route(new IndexRequest());