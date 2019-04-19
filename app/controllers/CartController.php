<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Cart;
use app\models\User;
use app\models\Order;
/**
 * Description of cartController
 *
 * @author grajdanin
 */

class CartController extends AppController{
    
    /** The Method "addAction" adds peace or peaces in cart 
     **/
    
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
    
    /** The Method "showAction" views cart's modal window 
     **/
    
    public function showAction(){
        $this->loadView('cart_modal');
    }
    
    /** The Method "deleteAction" removes 1 peace from cart 
     **/
    
    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : NULL;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        $this->redirect();
    }
    
    /** The Method "clearAction" clears cart 
     **/
    
    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.currency']);
        $this->loadView('cart_modal');
    }
    
    /** The Method "viewAction" views checkout page 
     **/
    
    public function viewAction() {
        $this->setMeta('Cart');
    }
    
    /** The Method checkoutAction Desc  
     * @return type variable2 Desc
     **/
    public function checkoutAction() {
        if(!empty($_POST)){
            // registration
            if(!User::checkAuth()){
                if(!$user_id = $this->registerUser($_POST)){
                    $this->redirect();
                }
            }
            //save order
            $data['user_id'] = isset($user_id) ? $user_id : $_SESSION['user']['id'];
            $data['note'] = !empty($_POST['note']) ? $_POST['note'] : '';
            $data['currency'] = \myshop\App::$registry->getProperty('currency')['code'];
            $user_email = isset($_SESSION['user']['email']) ? 
                    $_SESSION['user']['email'] : $_POST['email'];
            $order = new Order();
            $order->load($data);
            $order_id = $order->saveOrder();
            $order->mailOrder($order_id, $user_email);
        }
        $this->redirect();
    }
    
}
