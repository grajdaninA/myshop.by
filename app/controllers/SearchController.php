<?php


namespace app\controllers;

/**
 * Description of SearchController
 *
 * @author grajdanin
 */
class SearchController extends AppController{
    
    public function typeaheadAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : NULL;
            if($query){
                $products = \R::getAll('SELECT id, title FROM product WHERE'
                        . ' title LIKE ? LIMIT 11', ["%{$query}%"]);
            }
            echo json_encode($products);
        }
        die();
    }
    
    public function indexAction(){
        $class_banner = 'men_banner';
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : NULL;
        if($query){
            $products = \R::find('product', "title LIKE ?", ["%{$query}%"]);
        }
        $query = htmlspecialchars($query, ENT_QUOTES);
        $this->setMeta('Search by: ' . $query);
        $this->setData(compact('products', 'class_banner', 'breadcrumbs', 'query'));
    }
}
