<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace myshop;

/**
 * Description of SingletonCache
 *
 * @author grajdanin
 */
class CacheSingleton {
   
    use SingletonTrait;
    
    public function set($key, $data, $seconds = 3600) {
        if ($seconds) {
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            $file = $this->setCacheFile($key);
            if (file_put_contents($file, serialize($content))){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function get($key) {
        $file = $this->setCacheFile($key);
        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));
            if (time() <= $content['end_time']){
                return $content;
            }
            unlink($file);
        }
        return FALSE;
    }
    
    public function remove($key) {
        $file = $this->setCacheFile($key);
        if (file_exists($file)) {
            unlink($file);
        }
    }
    
    private function setCacheFile($key){
        return CACHE . '/' . md5($key) . '.cch';
    }
}
