<?php

use App\Auth\Auth;
use App\View\View;

class RegisterController extends FormController{

    public function index($request) {
        return View::view('register.tpl.php', $this->getTplInfo($request));
    }

    public function store($request) {
        $this->validator->validate($request->rules,$request->data);
        if(!empty((array)$this->formErrorHandler->get())) {
            return View::view('register.tpl.php', $this->getTplInfo());
            
        }
        if(Auth::checkForUser($request->data)) {
            header('Location:./');
        } else {
            return View::view('register.tpl.php', $this->getTplInfo());
        }
    }
}