<?php

namespace App\Request;

use Framework\Request\RequestAbstract;

class AuthRequest extends RequestAbstract {
    public function rules(): array {
        return [];
    }

    public function __construct() {
        parent::__construct();
        $this->data = [];
        $this->data['email'] = $_SERVER['PHP_AUTH_USER'];
        $this->data['password'] = $_SERVER['PHP_AUTH_PW'];
        $this->data = (object)$this->data;
    }
}