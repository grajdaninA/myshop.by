<?php

namespace app\controllers;

use myshop\App;

/**
 * Description of CurrensiesController
 *
 * @author grajdanin
 */
class CurrenciesController extends AppController{
    
    function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : NULL;
        if ($currency) {
            $curr = \R::findOne('currency', 'code = ?', [$currency]);
            if(!empty($curr)){
                setcookie('currency', $currency, time() + 3600*24*7, '/');
            }
        }
        $this->redirect();
    }
}
