<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace myshop\base;
/**
 * Description of Controller
 *
 * @author grajdanin
 */
abstract class AbstractController {
    public $route;
    public $controller;
    public $model;
    public $view;
    public $prefix;
    public $layout;
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];
    public $data = [];
    
    public function __construct($route) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }
    
    public function setData($data) {
        $this->data = $data;
    }
    
    public function setMeta($title = [], $desc = [], $keywords = []) {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }
    
    public function getView() {
        $viewObj = new View($this->route, $this->meta, 
                $this->layout, $this->view);
        $viewObj->render($this->data);
    }
    
    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
                $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
    
    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$view}.php";
        die;
    }
    
    public function redirect($http = FALSE){
        if ($http){
            $redirect = $http;
        } else {
            $redirect = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : URL;
        }
        header("Location: $redirect");
        die;
    }
}
