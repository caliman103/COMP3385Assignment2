<?php
    require_once "C:/COMP3385_Assigment_2/400005037/config/config.php";
    use App\Request\CreateUserRequest;
    use App\Router\Router;
    use App\Auth\Auth;
    
    Auth::startSession();
    if(null === Auth::$session->user() || (Auth::$session->user()->role !== 'Research Group Manager')) {
        header('Location:./dashboard');
    }

    //Create User Page
    Router::addRoute(['url' => '/createUser', 'controller' => 'CreateUserController.index', 'method' => 'GET', ]);
    Router::addRoute(['url' => '/createUser', 'controller' => 'CreateUserController.store', 'method' => 'POST', ]);

    Router::route(new CreateUserRequest());

?>