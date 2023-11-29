<?php

namespace App\FormGenerator;

use Framework\FormGeneration\FormGenAbstract;

class FormGen extends FormGenAbstract {
    private $errors;
    public function start(string $action, string $method) {
        echo '<form  action = "'. $action . '" method = "' . $method . '"> ';
    }

    public function end() {
        echo '</form>';
    }

    public function setErrors(object $errors) {
        $this->errors = $errors;
    }

    public function errors(string $field) {
        if(isset($this->errors->$field)){
            echo '<p class="text-danger"><strong>'.$this->errors->$field.'</strong></p>';
        } else {
            echo '';
        }
    }
}