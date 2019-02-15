<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Cart;
/**
 * Description of cartController
 *
 * @author grajdanin
 */

class CartController extends AppController{
    
    public function addAction(){
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : NULL;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : NULL;
        $mod_id = !empty($_GET['mod']) ? (int)$_GET['mod'] : NULL;
        $mod = NULL;
        if($id){
            $product = \R::findOne('product', 'id = ?', [$id]);
            if($mod_id){
                $mod = \R::findOne('modification', 'id = ? AND product_id = ?',
                        [$mod_id, $id]);
            }
        }
        $cart = new Cart();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        $this->redirect();
    }
    
    public function showAction(){
        $this->loadView('cart_modal');
    }
    
    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : NULL;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        $this->loadView('cart_modal');
    }
    
    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.currency']);
        $this->loadView('cart_modal');
    }
    
}
