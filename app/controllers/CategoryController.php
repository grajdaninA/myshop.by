<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of CategoryController
 *
 * @author grajdanin
 */

use app\models\Breadcrumbs;
use app\models\Category;
use myshop\App;
use myshop\libs\Pagination;

class CategoryController extends AppController{
    
    public function viewAction(){
        $class_banner = 'men_banner';
        
        $alias = $this->route['alias'];
        $category = \R::findOne('category', 'alias = ?', [$alias]);
        if(!$category){
            throw new \Exception('Page not found', 404);
        }
        
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);
        
        $cat_model = new Category();
        $children_ids = $cat_model->getIds($category->id);
        
        $ids = !$children_ids ? $category->id : $children_ids . $category->id;
        $query = "category_id IN ($ids)";
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$registry->getProperty('pagination');
        $count = \R::count('product', $query);
        $pagination = new Pagination($page, $perpage, $count);
        
        $start = $pagination->getStart();
        $products = \R::find('product', $query . " LIMIT $start, $perpage");
        
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->setData(compact('class_banner', 'breadcrumbs', 'products', 
                'pagination'));
        
    }
}
