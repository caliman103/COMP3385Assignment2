<?php

namespace App\View;

use Framework\View\ViewInterface;
use App\Validate\ViewValidate;
use App\Errorhandler\ViewErrorHandler;

class View implements ViewInterface {

    static public function view(string $templateName, array $data = []) {
        $validator = new ViewValidate();
        $errorHandler = new ViewErrorHandler(E_ALL);
        if(!empty($data)) {
            foreach(array_keys($data) as $key) {
                if(!$validator->validate($key)) {
                    $errorHandler->add($key, 'is not a valid variable name');
                    trigger_error($key. ' is not a valid variable name', E_USER_ERROR);
                    //unset($data[$key]);
                }
            }
        }
        
        if(!empty((array)$errorHandler->get())){
            foreach ($errorHandler->get() as $key => $message) {
                echo '"'.$key.'" : ' . $message;
            }
            return;
        }
        extract($data);
        require TPL_DIR.'/'.$templateName;
    }
}