<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of User
 *
 * @author grajdanin
 */


class User extends AppModels {
    
    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
    ];
    
    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['address'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ],
    ];
    
    /** The Method "chechUniquie" checks login and email for uniqueness 
     *  
     * @return boolean TRUE if email or/and login not use, FALSE if otherwise
     **/
    public function chechUniquie() {
        $user = \R::findOne('user', 'login = ? OR email = ?', 
                [$this->attributes['login'], $this->attributes['email']]);
        if ($user) {
            if ($user->login == $this->attributes['login']){
            $this->errors['uniquie'][] = 'This login is already in use';
        }
            if ($user->email == $this->attributes['email']) {
                $this->errors['uniquie'][] = 'This email is already in use';
            }
            return FALSE;
        }
        return TRUE;
    }
    
    /** The Method "login" authenticates and authorizes the user 
     * @param string $login 
     * @param string $password 
     * @param boolean $isAdmin Default FALSE 
     * @return boolean  TRUE if success or FALSE if failure
     **/
    public function login($login, $password, $isAdmin = FALSE) {
        if ($login && $password) {
            if ($isAdmin) {
                $user = \R::findOne('user', "login = ? AND role = 'admin'", [$login]);
            } else {
                $user = \R::findOne('user', "login = ?", [$login]);
            }
            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $key => $value){
                        if($key != 'password'){
                            $_SESSION['user'][$key] = $value;
                        }
                    }
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
    
    /** The static Method "checkAuth" checks auth user  
     * @return boolean true | false
     **/
    public static function checkAuth() {
        return isset($_SESSION['user']);
    }
    
    /** The static Method "isAdmin" checks auth user with role admin  
     * @return boolean true | false
     **/
    public static function isAdmin() {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }
    
}
