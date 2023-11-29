<?php

use App\Auth\Auth;

class IndexController extends FormController {

    public function index($request) {
        return $this->show('index.tpl.php');
    }

    public function login($request) {
        $this->validator->validate($request->rules, $request->data);
        if(!empty((array)$this->formErrorHandler->get())) {
            return $this->show('index.tpl.php');
        }
        
        if(Auth::login($request->data)) {
            header('Location:./dashboard');
        } else {
            return $this->show('index.tpl.php');
        }
    }//end login
}//end IndexController
