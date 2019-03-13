<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\User;

/**
 * Description of UserController
 *
 * @author grajdanin
 */
class UserController extends AppController{
    
    public function logoutAction(){
        session_destroy();
    }
    
    public function loginAction(){
        
    }
    
    /** The Method signupAction Desc 
     * @return void
     **/
    public function signupAction() {
        if (!empty($_POST)) {
            $user = new User();
            $user->load($_POST);
            debug($user);
            die();
        }
        $this->setMeta('registration');
    }
}
