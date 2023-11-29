<?php

namespace App\Errorhandler;

use Framework\ErrorHandler\ErrorHandlerAbstract;


class FormErrorHandler extends ErrorHandlerAbstract {
    public function handleError($errno, $errstr, $errfile, $errline) {
        $this->errors[preg_split("/:/",$errstr)[0]] = preg_split("/:/",$errstr)[1];
        //printer('Error: '.$errstr .' in '.$errfile .' on line '. $errline);
    }
}