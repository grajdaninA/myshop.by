<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use myshop\App;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

/**
 * Description of Order
 *
 * @author grajdanin
 */
class Order extends AppModels{
    
    public $attributes = [
        'user_id' => '',
        'note' => '',
        'currency' => '',
    ];
    
    /** The Method "saveOrder" saves order's data to the DB  
     * @return integer $order_id stored record id
     **/
    public function saveOrder() {
        $order_id = $this->save('order');
        $this->saveOrderProduct($order_id);
        return $order_id;
    }
    
    /** The Method "saveOrderProduct" saves products to the DB
     * @param integer $order_id oreder id  
     * 
     **/
    public function saveOrderProduct($order_id) {
        $sql_part = '';
        foreach ($_SESSION['cart'] as $product_id => $product){
            $product_id = (int) $product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, "
            . "'{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        \R::exec("INSERT INTO order_product (order_id, product_id, qty, title, "
                . "price) VALUES $sql_part");
    }
    
    /** The Method mailOrder Desc 
     * @param integer $order_id Desc 
     * @param string $user_email Descrdfsdfiption
     **/
    
    // smtp.yandex.ru
    // 495
    // SSL/TLS
    // usaually password
    
    // test-myshop@yandex.ru
    // myshop13
    //
    
    
    public function mailOrder($order_id, $user_email) {
        // create the transport
        $transport = (new Swift_SmtpTransport(
                App::$registry->getProperty('smtp_host'),
                App::$registry->getProperty('smtp_port'),
                App::$registry->getProperty('smtp_protocol')))
                ->setUsername(App::$registry->getProperty('smtp_login'))
                ->setPassword(App::$registry->getProperty('smtp_password'));
        
        // create the mailer using transport
        $mailer = new Swift_Mailer($transport);
        
        // create a message
        ob_start();
        require APP . '/views/mail/mail_order.php';
        $body = ob_get_clean();
        
        // message for client
        $message_client = (new Swift_Message("Order # {$order_id} myshop.by"))
                ->setFrom([App::$registry->getProperty('smtp_login') =>
                        App::$registry->getProperty('shop_name')])
                ->setTo($user_email)
                ->setBody($body, 'text/html');
        // message for manager
        
        $message_manager = (new Swift_Message("Order # {$order_id} myshop.by"))
                ->setFrom([App::$registry->getProperty('smtp_login') =>
                        App::$registry->getProperty('shop_name')])
                ->setTo(App::$registry->getProperty('manager_email'))
                ->setBody($body, 'text/html');
        
        // send message
        $mailer->send($message_client);
        $mailer->send($message_manager);

        // clear cart
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.currency']);
        
        $_SESSION['success'] = "Thank's for your order. Our manager will "
                . "contact you soon.";
    }
}
