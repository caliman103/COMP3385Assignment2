<?php
    namespace App\Model;
    use Framework\Model\Model;
    class Users extends Model{
        static public function search(string $email, string $password)  {
            $users = self::all();
            foreach($users as $user) {
                if($user->email === $email && password_verify($password,$user->password)) {
                    return $user; 
                }
            }
            return null;
        }
    } 
?>