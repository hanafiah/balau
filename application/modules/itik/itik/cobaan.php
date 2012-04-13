<?php

class Itik_itik_cobaan extends \System\Controller {
    
    function __construct() {
        parent::__construct();
    }

    function action_ayam($param = 20) {
        echo 'Awak panggil ayam ? ', $param;
        
        self::view('cobaan_view');
    }

}