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
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        $this->redirect();
    }
    
    public function loginAction(){
        if (!empty($_POST)) {
            $user = new User();
            $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : NULL;
            $password = !empty(trim($_POST['password'])) ? 
                    trim($_POST['password']) : NULL;
            if($user->login($login, $password)){
                $_SESSION['success'] = 'вы успешно авторизованы';
                $url = isset($_SESSION['old_url']) ? $_SESSION['old_url'] : URL;
            } else {
                $_SESSION['errors'] = 'пароль/логин не верны';
                $url = NULL;
            }
            $this->redirect($url);
        } else {
            $_SESSION['old_url'] = $_SERVER['HTTP_REFERER'];
        }
        $this->setMeta('signin');
    }
    
   
    public function signupAction() {
        if (!empty($_POST)) {
            $this->registerUser($_POST);
            $this->redirect();
        }
        $this->setMeta('registration');
    }
    
    
}
