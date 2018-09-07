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
    }
}
