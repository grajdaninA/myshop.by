<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Product;
use app\models\Breadcrumbs;
/**
 * Description of ProductController
 *
 * @author grajdanin
 */
class ProductController extends AppController{
    
    public function viewAction() {
        $class_banner = 'men_banner';
        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if(!$product){
            throw new \Exception('Страница не найдена', 404);
        }
        
        // breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, 
                $product->title, 'home');
        //related product
        $sql = "SELECT * FROM `related_product` JOIN `product` "
                . "ON product.id = related_product.related_id "
                . "WHERE related_product.product_id = $product->id";
        $related = \R::getAll($sql);
        
        //recently viewed
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);
        
        $r_viewed = $p_model->getRecentlyViewed();
        $recentlyViewed = NULL;
        if ($r_viewed) {
            $recentlyViewed = \R::find('product', 'id IN (' . 
                    \R::genSlots($r_viewed) . ') LIMIT 3', $r_viewed);
        }
        
        // product's modifications
        $mods = \R::findAll('modification', 'product_id = ?', [$product->id]);
        
        //gallery
        $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);
        
        
        $this->setData(compact('class_banner', 'product', 'related', 
                'recentlyViewed', 'breadcrumbs', 'class_li_breadcrumbs',
                'mods', 'gallery'));
    }
}
