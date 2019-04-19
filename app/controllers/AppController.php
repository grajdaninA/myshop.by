<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\AppModels;
use myshop\App;
use app\widgets\currency\Currency;
use myshop\base\AbstractController;
use myshop\CacheSingleton;
use app\models\User;
/**
 * Description of App
 *
 * @author grajdanin
 */
class AppController extends AbstractController {
    
    public function __construct($route) {
        parent::__construct($route);
        new AppModels();
        //setcookie('currency', 'EUR', time() + 3600*24*7, '/');
        App::$registry->setProperty('currencies', Currency::getCurrencies());
        App::$registry->setProperty('currency', 
            Currency::getCurrency(App::$registry->getProperty('currencies')));
        App::$registry->setProperty('cats', self::cacheCategory());
    }
    
    public static function cacheCategory(){
        $cache = CacheSingleton::getInstance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
    
    /** The Method "registerUser" new user data's checks and saves to the db 
     * @param array $data new user data's (login, password ...) 
     * @return integer $user_id new user id's after saving to the db
     **/
    public function registerUser($data) {
        $user = new User();
        $user->load($data);
        if (!$user->validate($data) || !$user->chechUniquie()) {
            $user->getErrors();
            $_SESSION['form_data'] = $data;
        } else {
            $user->attributes['password'] = 
                    password_hash($user->attributes['password'], 
                            PASSWORD_DEFAULT);
            $user_id = $user->save('user');
            if ($user_id) {
                $_SESSION['success'] = 'OK';
                $user->login($data['login'], $data['password']);
            } else {
                $_SESSION['errors'] = 'ошибка!';
            }
        }
        return $user_id;
    }
    
}
