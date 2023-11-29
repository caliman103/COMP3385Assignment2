<?php
    namespace App\Session;

    use Framework\Session\SessionAbstract;

    class Session extends SessionAbstract {
        /**
         * This function will return the current user
         */
        public function user() {
            if(isset($this->data['user'])) {
                return $this->data['user'];
            }
            return null;
        }

        protected function validateKey(string $key) : bool {
            if (!is_string($key) || $key === '') {
                return false;
            }
        }
    }
?>