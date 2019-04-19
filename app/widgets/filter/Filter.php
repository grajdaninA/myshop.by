<?php

namespace app\widgets\filter;

use myshop\CacheSingleton;
/**
 * Description of Filter
 *
 * @author grajdanin
 */
class Filter {
    
    public $attrs;
    public $groups;
    public $tpl;


    public function __construct() {
        $this->tpl = __DIR__ . "/filter_tpl/filter_tpl.php";
//        $this->getOptions($options);
        $this->run();
    }
    
    /** The Method "run" Desc 
     * 
     **/
    protected function run() {
        $cache = CacheSingleton::getInstance();
        $this->groups = $cache->get('filter_group');
        if (!$this->groups){
            $this->groups = $this->getGroups();
            $cache->set('filter_group', $this->groups, 2);
        }
        $this->attrs = $cache->get('filter_attrs');
        if (!$this->attrs){
            $this->attrs = $this->getAttrs();
            $cache->set('filter_attrs', $this->attrs, 2);
        }
        $filters = $this->getHtml();
        echo $filters;
    }
    
    /** The protected Method "getGroups"   
     * @return array $groups Returns 'id' and 'title' from table attribute_group.
     **/
    protected function getGroups() {
        $groups = \R::getAssoc('SELECT * FROM attribute_group');
        return $groups;
    }
    
    /** The protected Method "getAttrs"   
     * @return array $groups Returns 'id', 'value' and 'attr_grop_id' 
     *                       from table attribute_value.
     **/
    protected function getAttrs() {
        $data = \R::getAssoc('SELECT * FROM attribute_value');
        $attrs = [];
        foreach ($data as $k => $v){
            $attrs[$v['attr_group_id']][$k] = $v['value'];
        }
        return $attrs;
    }
    
    /** The Method "getHtml"   
     * @return string  HTML-code
     **/
    protected function getHtml() {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}
