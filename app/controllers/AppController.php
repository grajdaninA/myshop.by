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
    
}
