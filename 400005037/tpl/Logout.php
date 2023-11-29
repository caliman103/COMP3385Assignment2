<?php
    use App\Auth\Auth;
    Auth::logout();
    //Auth::$session->destroy();
    header('Location:./');
?>