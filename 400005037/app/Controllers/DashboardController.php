<?php

use App\Auth\Auth;
use App\View\View;
use App\Model\User_Access_Levels;
use Framework\Response\ResponseAbstract;

class DashboardController extends ResponseAbstract {
    

    public function index($request) {
        return View::view('dashboard.tpl.php', ['user' => Auth::$session->user(), 'permissions' => $this->getPermissions()]);
    }

    private function getPermissions()  : array {
        $allPermissions =  User_Access_Levels::find(
            ['accessLevels'],
            [
                ['column' => 'email','operator' => '=', 'value' => Auth::$session->user()->email,'follow' => '',],
            ]    
        );
        foreach($allPermissions as $permission) {
            $permissions[] = $permission->accessLevels;
        }
        return $permissions;
    }

}