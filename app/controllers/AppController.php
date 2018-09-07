<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of App
 *
 * @author grajdanin
 */
class AppController extends \myshop\base\AbstractController {
    
    public function __construct($route) {
        parent::__construct($route);
        new \app\models\AppModels();
    }
    
}
