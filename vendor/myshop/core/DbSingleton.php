<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace myshop;

/**
 * Description of DbSingleton
 *
 * @author grajdanin
 */
class DbSingleton {
    
    use SingletonTrait;
    
    public function __construct() {
        $db = require_once CONF . '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if (!\R::testConnection()) {
            throw new \Exception('connect to DB error', 500);
        }
        \R::freeze(TRUE);
        if (DEBUG) {
            \R::debug(TRUE, 1);
        }
    }
}
