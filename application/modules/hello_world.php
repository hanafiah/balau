<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of hello_world
 *
 * @author ibnuyahya
 */
class hello_world extends System\Controller {
    public function indexAction() {
        
        $t = self::model('mtest');
        $view['collection'] = $t->getCollections();
        
        self::view('hello_world',$view);
    }

}

?>
