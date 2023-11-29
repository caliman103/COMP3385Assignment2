<?php

use App\Auth\Auth;

class AuthController extends FormController {

    public function index($request) {
        if(Auth::login($request->data)) {
            header('Location:./dashboard');
        } else {
            header('WWW-Authenticate: Basic realm="Test Authentication System"');
            header('HTTP/1.0 401 Unauthorized');
            printer($this->formErrorHandler->get()->email);
            echo 'Try Again <a href="./Auth">Click Here</a><br><br>';
            echo 'Return to the Index Page: <a href="./">Index Page</a>';
        }
    }
}