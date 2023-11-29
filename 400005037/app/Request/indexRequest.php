<?php
    namespace App\Request;

    use Framework\Request\RequestAbstract;

    class IndexRequest extends RequestAbstract {
        public function rules() : array {
            return [
                'email' => ['required', 'min:3', 'email'],
                'password' => ['required', 'min:10', 'alphaNum', 'regex:[A-Z]'],
            ];
        }
    }
?>