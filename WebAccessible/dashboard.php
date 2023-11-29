<?php

require_once "C:/COMP3385_Assigment_2/400005037/config/config.php";
use App\Request\DashboardRequest;
use App\Router\Router;
use App\Auth\Auth;

Auth::startSession();
if(null === Auth::$session->user()) {
    header('Location:./');
}
//Dashboard Page
Router::addRoute(['url' => '/dashboard', 'controller' => 'DashboardController.index', 'method' => 'GET', ]);


Router::route(new DashboardRequest());

