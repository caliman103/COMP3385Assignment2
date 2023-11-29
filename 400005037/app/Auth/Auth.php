<?php

namespace App\Auth;

use Framework\Auth\AuthAbstract;
use App\Model\Users;
use App\Model\User_Access_Levels;
use App\Session\Session;

class Auth extends AuthAbstract {
    static public $session;

    static public function startSession() {
        self::$session = new Session();
    }

    static public function login(object $userInfo) : bool {
        $user = Users::search($userInfo->email, $userInfo->password);
        if(null !== $user) {
            self::$session->add('user',$user);
            return true; 
        }
        
        trigger_error('email:Invalid Email/Password Credentials');
        return false;
    }

    static public function logout(): void {
        self::$session->remove('user');
        self::$session->destroy();
    }

    static public function checkForUser($data) : bool {
        $result = Users::find(
            ['*'],
            [
                ['column' => 'email','operator' => '=', 'value' => $data->email,'follow' => '',],
            ]
        );
        if(empty($result)) {
            Users::insert([
                'username' => $data->username,
                'email' => $data->email,
                'password' => password_hash($data->password, PASSWORD_DEFAULT),
                'role' => isset($data->role) ? $data->role : "Research Group Manager"
            ]);
            self::insertRolePermissions($data->email, $data->role);
            return true;
        }

        trigger_error('email:Email Already Taken');
        return false;
    }

    static private function insertRolePermissions($email, $role) {
        if(null === $role) {
            $role = 'Research Group Manager';
        }
        $rolePermissions = [
            "Research Group Manager" => [1, 2, 3, 4],
            "Research Study Manager" => [1, 2, 3],
            "Researcher" => [1]
        ];
        foreach($rolePermissions[$role] as $role) {
            User_Access_Levels::insert([
                'email' => $email,
                'accessLevels' => $role
            ]);
        }
        
    }
}
