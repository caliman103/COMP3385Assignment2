<?php
    require_once "C:/COMP3385_Assigment_2/400005037/config/config.php";
    use App\Auth\Auth;
    Auth::startSession();
    Auth::logout();
    header('Location:./');


?>