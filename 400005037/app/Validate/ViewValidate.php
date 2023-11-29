<?php

namespace App\Validate;

class ViewValidate {
    private $rule = "/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/";

    public function validate($key) {
        return preg_match($this->rule, $key) === 1;
    }
}