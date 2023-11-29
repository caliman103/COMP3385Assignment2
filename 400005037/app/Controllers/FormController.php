<?php

use Framework\Response\ResponseAbstract;
use App\Errorhandler\FormErrorHandler;
use App\Auth\Auth;
use App\FormGenerator\FormGen;
use App\View\View;

abstract class FormController extends ResponseAbstract {
    protected $formErrorHandler;
    public function __construct(){
        parent::__construct();
        $this->formErrorHandler = new FormErrorHandler(E_ALL);
    }

    protected function getTplInfo() : array {
        $formGen = new FormGen();
        $formGen->setErrors($this->formErrorHandler->get());
        $data = [
            'user' => Auth::$session->user(),
            'form' => $formGen,
            'inputClasses' => ['border', 'border-2', 'border-secondary'],
            'buttonClasses' => ['btn-primary'],
        ];
        return $data;
    }

    protected function show($template) {
        $this->formErrorHandler->__destruct();
        return View::view($template, $this->getTplInfo());
    }
} 