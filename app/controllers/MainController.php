<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use myshop\App;

/**
 * Description of MainControllers
 *
 * @author grajdanin
 */
class MainController extends AppController {
      
    public function indexAction() {
        $class_banner = 'banner';
        // I need transfer the code with queries to the DB to the Models class
        $brands = \R::find('brand', 'LIMIT 3');
        $hits = \R::find('product', "hit='1' AND status='1' LIMIT 8");
        $this->setMeta(App::$registry->getProperty('shop_name'), 
                $desc = 'описание', $keywords = 'ключевые');
        $this->setData(compact('brands', 'hits', 'class_banner'));
    }
}
