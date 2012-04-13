<?php

class Ayam_ayam extends \System\Controller{
    public function beforeAction() {
        echo 'before';
    }
    
    public function testAction(){
        self::view('sub/kukulala');
    }
    
}