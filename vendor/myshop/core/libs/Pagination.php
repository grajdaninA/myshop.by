<?php

namespace myshop\libs;

/**
 * Description of Pagination
 * The class generates code for pagination in style bootstrap v3.3.7
 * @author grajdanin
 */

class Pagination {
    
    public $currentPage;
    public $perpage; // count of items on one page
    public $total; // count of all items
    public $countPages; // count of pages
    public $uri;
    
    public function __construct($page, $perpage, $total) {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }
    
    /**
     * The method returns count of pages, but min 1 page
     * @return integer count of pages
    **/
    
    private function getCountPages(){
        return ceil($this->total / $this->perpage) ? : 1;
    }
    
    /**
     * The method returns valid page number
     * @param integer $page page number
     * @return integer valid page number
    **/
    
    private function getCurrentPage($page){
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }
    
    /**
     * The method returns the last item number on the previous page.
     * That is, the item from which you want to start the next page
     * @return integer item number
    **/
    
    public function getStart(){
        return ($this->currentPage - 1) * $this->perpage;
    }
    
    /**
     * The method returns request uri string without the get parametr "page"
     * 
     * @return string URI
     * 
     * example: 
     *          uri: /category/casio?sort=name&page=1&filter=1,2
     *          out: /category/casio?sort=name&amp;filter=1,2&amp;
    **/

    public function getParams() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if(isset($url[1]) && $url[1] != ''){
            $params = explode('&', $url[1]);
            foreach ($params as $param){
                if (!preg_match("#page=#", $param)) {
                    $uri .= "{$param}&amp;";
                }
            }
        }
        return urldecode($uri);
    }
    
    /**
     * The method returns html code with bootstrap pagination style
     * 
     * @return string HTML-code
    **/
    
    public function getHtml(){
        $back = null;
        $forward = null;
        $startpage = null;
        $endpage = null;
        $page2left = null;
        $page1left = null;
        $page2right = null;
        $page1right = null;

        if( $this->currentPage > 1 ){
            $back = "<li><a class='nav-tabs' href='{$this->uri}page=" .
                    ($this->currentPage - 1). "'>&lt;</a></li>";
        }
        if( $this->currentPage < $this->countPages ){
            $forward = "<li><a class='nav-tabs' href='{$this->uri}page=" .
                    ($this->currentPage + 1). "'>&gt;</a></li>";
        }
        if( $this->currentPage > 3 ){
            $startpage = "<li><a class='nav-tabs' "
                    . "href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if( $this->currentPage < ($this->countPages - 2) ){
            $endpage = "<li><a class='nav-tabs' "
                    . "href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }
        if( $this->currentPage - 2 > 0 ){
            $page2left = "<li><a class='nav-tabs' href='{$this->uri}page=" 
            .($this->currentPage-2). "'>" .($this->currentPage - 2). "</a></li>";
        }
        if( $this->currentPage - 1 > 0 ){
            $page1left = "<li><a class='nav-tabs' href='{$this->uri}page=" 
            .($this->currentPage-1). "'>" .($this->currentPage-1). "</a></li>";
        }
        if( $this->currentPage + 1 <= $this->countPages ){
            $page1right = "<li><a class='nav-tabs' href='{$this->uri}page=" 
            .($this->currentPage + 1). "'>" .($this->currentPage+1). "</a></li>";
        }
        if( $this->currentPage + 2 <= $this->countPages ){
            $page2right = "<li><a class='nav-tabs' href='{$this->uri}page=" 
            .($this->currentPage + 2). "'>" .($this->currentPage + 2). "</a></li>";
        }
        // women_pagenation dc_paginationA dc_paginationA06 styles no bootstrap, 
        // they are added for one skin
        return '<ul class="pagination women_pagenation dc_paginationA dc_paginationA06">' 
                . $startpage.$back.$page2left.$page1left
                . '<li class="active"><a>'.$this->currentPage.'</a></li>'
                .$page1right.$page2right.$forward.$endpage . '</ul>';
    }
    
    public function __toString() {
        return $this->getHtml();
    }
}
