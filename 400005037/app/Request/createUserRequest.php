<?php
    namespace App\Request;

    use Framework\Request\RequestAbstract;

    class CreateUserRequest extends RequestAbstract {
        public function rules() : array {
            return [
                'username' => ['required', 'min:3'],
                'email' => ['required', 'min:3', 'email'],
                'password' => ['required', 'min:10', 'alphaNum', 'regex:[A-Z]'],
            ];
        }
    }
?>