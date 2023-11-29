<?php

use App\Auth\Auth;
use App\View\View;
use App\FormGenerator\FormGen;
use Framework\Response\ResponseAbstract;

class CreateUserController extends FormController {
    
    public function index($request) {
        return View::view('createUser.tpl.php', $this->getTplInfo($request));
    }

    public function store($request) {
        $this->validator->validate($request->rules,$request->data);
        if(!empty((array)$this->formErrorHandler->get())) {
            return View::view('createUser.tpl.php', $this->getTplInfo());
            
        }
        if(Auth::checkForUser($request->data)) {
            header('Location:./');
        } else {
            
            return View::view('createUser.tpl.php', $this->getTplInfo());
        }
    }

    protected function getTplInfo() :array {
        $data = parent::getTplInfo();
        $data['selectClasses'] = ['text-center', 'border border-2 border-secondary'];
        $data['roleOptions'] = $this->getRoleOptions();
        return $data;
    }//end getTplInfo

    private function getRoleOptions() : array {
        return [
            'Choose Role' => "",
            'Research Study Manager' => 'Research Study Manager',
            'Researcher' => 'Researcher'
        ];
    }
}