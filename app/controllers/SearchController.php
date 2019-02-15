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
//                echo $query;
                $products = \R::getAll('SELECT id, title FROM product WHERE'
                        . ' title LIKE ? LIMIT 11', ["%{$query}%"]);
            }
            echo json_encode($products);
        }
        die();
    }
}
