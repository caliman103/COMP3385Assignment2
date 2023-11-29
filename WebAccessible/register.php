<?php

    require_once "C:/COMP3385_Assigment_2/400005037/config/config.php";
    use App\Request\RegisterRequest;
    use App\Router\Router;
    use App\Auth\Auth;

    Auth::startSession();
    if(null !== Auth::$session->user()) {
        header('Location:./dashboard');
    }

    //Register Page
    Router::addRoute(['url' => '/register', 'controller' => 'RegisterController.index', 'method' => 'GET', ]);
    Router::addRoute(['url' => '/register', 'controller' => 'RegisterController.store', 'method' => 'POST', ]);

    Router::route(new RegisterRequest());

?>