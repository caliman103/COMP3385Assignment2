<?php

namespace App\Errorhandler;

use App\Auth\Auth;
use Framework\ErrorHandler\ErrorHandlerAbstract;
use Framework\Validation\Validate;

class ErrorHandler extends ErrorHandlerAbstract {
    public function handleError($errno, $errstr, $errfile, $errline) {
        //$this->errors['Error:'.$errno] = $errstr;
        printer('Error: '.$errstr .' in '.$errfile .' on line '. $errline);
    }
}