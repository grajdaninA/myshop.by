<?php

require_once dirname(__DIR__) . '/config/init.php';
require_once CONF . '/routes.php';
require_once LIBS . '/functions.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

new \myshop\App();

//var_dump(\myshop\Router::getRoutes());