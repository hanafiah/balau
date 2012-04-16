<?php

class Sub__hello extends System\Controller {

    public function beforeAction() {
        echo 'before';
    }

    public function indexAction() {
        self::view('hello');
       
    }

}