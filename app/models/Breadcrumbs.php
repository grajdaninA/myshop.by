<?php

namespace app\models;

use myshop\App;

/**
 * Description of Breadcrumbs
 *
 * @author grajdanin
 */
class Breadcrumbs {
    
    /**
     * The method creates breadcrumbs
     * @param integer $category_id The category id 
     * @param string $name The product's title
     * @param string $li_class Tag's class <li class="$li_class"></li>   
     * @return string The html code for BOOTSTRAP
    **/
    
    public static function getBreadcrumbs($category_id, $name = '', 
            $li_class = '') { 
        $cats = App::$registry->getProperty('cats');
        $breadcrumbs_array = self::getParts($cats, $category_id);
        $breadcrumbs = "<li class='$li_class'><a href='". URL ."'>Home/</a></li>";
        if ($breadcrumbs_array) {
            foreach ($breadcrumbs_array as $alias => $title) {
                $breadcrumbs .= "<li class='$li_class'><a href='" . URL 
                        . "/category/{$alias}'>{$title}/</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='$li_class'>$name</li>";
        }
        return $breadcrumbs;
    }
    
    /**
     * The method creates tree of breadcrumbs from categories
     * @param array $cats Categories
     * @param int $id The id product   
     * @return array The tree of breadcrumbs
    **/    
    
    public static function getParts($cats, $id) {
        if (!$id) return FALSE;
        $breadcrumbs = [];
        foreach ($cats as $key => $value){
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else {
                break;
            }
        }
        return array_reverse($breadcrumbs, TRUE);
    }
}
