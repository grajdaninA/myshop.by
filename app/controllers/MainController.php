<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of MainControllers
 *
 * @author grajdanin
 */
class MainController extends AppController {
      
    public function indexAction() {
        $names = \R::findAll('newtable');
        $this->setMeta(\myshop\App::$registry->getProperty('shop_name'), 
                $desc = 'описание', $keywords = 'ключевые');
        $holop = ['holop # 2340', 'holop # 2222'];
        
        /** @var CacheSingleton */
        $cache = \myshop\CacheSingleton::getInstance();
        $holops = $cache->set('new_cache', $holop);
        if ($holops) {
            $news = $cache->get('new_cache');
        } else {
            throw new \Exception('cache error', 500);
        }
        $time = time();
        $this->setData(compact('time', 'news'));
    }
}
