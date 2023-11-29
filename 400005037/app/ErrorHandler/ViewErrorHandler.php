<?php

namespace App\Errorhandler;

use Framework\ErrorHandler\ErrorHandlerAbstract;

class ViewErrorHandler extends ErrorHandlerAbstract {
    public function handleError($errno, $errstr, $errfile, $errline) {
        $this->errors[array_key_last($this->errors)] = 'Error: '.$errstr .' in '.$errfile .' on line '. $errline;
        //$this->errors['Error:'.$errno] = $errstr;
        //printer('Error: '.$errstr .' in '.$errfile .' on line '. $errline);
    }
}