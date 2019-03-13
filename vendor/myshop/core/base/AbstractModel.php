<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace myshop\base;

/**
 * Description of ModelAbstract
 *
 * @author grajdanin
 */
abstract class AbstractModel {
    
    public $attributes = [];
    public $errors = [];
    public $rules = [];
    
    public function __construct() {
        \myshop\DbSingleton::getInstance();
    }
    
    /** The Method load Desc 
     * @param array $data Desc 
     * @return void
     **/
            
    public function load($data){
        foreach ($this->attributes as $name => $value){
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }
}
