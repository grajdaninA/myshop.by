<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Category
 *
 * @author grajdanin
 */
class Category extends AppModels{
    
    /**
     * The method selects from registry all children ids of Category
     * @param integer $id The category id (parent id)
     * @return string Example: $ids = "id1,id2,id3,...idn," (children ids)
    **/
    
    public function getIds($id) {
        $cats = \myshop\App::$registry->getProperty('cats');
        $ids = NULL;
        foreach ($cats as $key => $value) {
            if($id == $value['parent_id']){
                $ids .= $key . ',';
                $ids .= $this->getIds($key);
            }
        }
        return $ids;
    }
}
