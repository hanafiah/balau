<?php

class Ayam_ayam extends \System\Controller {

    public function beforeAction() {
        echo 'before';
    }

    public function testAction() {

        $t = self::model('test');
        $test = $t->test();
        echo '<br/>';
        // iterate through the results
        foreach ($test as $obj) {
            echo $obj["title"] . "<br/>";
        }

        self::view('sub/kukulala');
    }

}