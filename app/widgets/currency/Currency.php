<?php

namespace app\widgets\currency;

use myshop\App;
/**
 * Description of Currency
 *
 * @author grajdanin
 */

class Currency {
    
    protected $tpl;
    protected $currencies;
    protected $currency;
    
    public function __construct() {
        $this->tpl = __DIR__ . "/currency_tpl/currency.php";
        $this->run();
    }
    
    protected function run(){
         // may be need check registry?????
        $this->currencies = App::$registry->getProperty('currencies');
        $this->currency = App::$registry->getProperty('currency');
        echo $this->getHtml();
    }
    
    public static function getCurrencies(){
        $sql = "SELECT code, title, symbol_left, symbol_right, value, base FROM "
                . "currency ORDER BY base DESC";
        return \R::getAssoc($sql);
    }
    
    public static function getCurrency($currencies){
        if (isset($_COOKIE['currency']) && 
                array_key_exists($_COOKIE['currency'], $currencies)) {
            $key = $_COOKIE['currency'];
        } else {
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }
    
    public function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}
