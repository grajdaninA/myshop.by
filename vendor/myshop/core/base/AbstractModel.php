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

use Valitron\Validator;

abstract class AbstractModel {
    
    public $attributes = [];
    public $errors = [];
    public $rules = [];
    
    public function __construct() {
        \myshop\DbSingleton::getInstance();
    }
    
    /** The Method "load" loads data from web form 
     * into an array according to the array keys 
     * @param array $data data from web form 
     * @return void
     **/
            
    public function load($data){
        foreach ($this->attributes as $name => $value){
            if (isset($data[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }
    
    /** The Method "validate" is validate data according with rules,
     *  which are described in the $rules. 
     * @param array $data  
     * @return boolean validate ok: TRUE | else FALSE and Class->errors
     **/
    
    public function validate($data) {
//        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if ($v->validate()) {
            return TRUE;
        }
        $this->errors = $v->errors();
        return FALSE;
    }
    
    /** The Method "getErrors" return HTML-wraper for error 
     * 
     * @return string $errors HTML code
     **/
    
    public function getErrors() {
        $errors = '<ul>';
        foreach ($this->errors as $error){
            foreach ($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= "</ul>";
        $_SESSION['errors'] = $errors;
        return $errors;
    }
    
    /** The Method "save" save registration data in db 
     * @param string $table name of table
     * @return integer | string Save a data in db, 
     *          returned id's saved record 
     *          or exception if failure.
     **/
    public function save($table) {
        $bean = \R::dispense($table);
        foreach ($this->attributes as $name => $value){
            $bean->$name = $value;
        }
        return \R::store($bean);
    }
}
