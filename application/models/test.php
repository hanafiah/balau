<?php

/**
 * Description of test
 *
 * @author ibnuyahya
 */
class test extends \Application\Models\Model {

    public function __construct() {
        parent::__construct();
    }

    public function test() {
        $db = $this->db;

// select a collection (analogous to a relational database's table)
        $collection = $db->cartoons;
// add a record
        $obj = array("title" => "Calvin and Hobbes", "author" => "Bill Watterson");
        $collection->insert($obj);

// add another record, with a different "shape"
        $obj = array("title" => "XKCD", "online" => true);
        $collection->insert($obj);

// find everything in the collection
        $cursor = $collection->find();
        return $cursor;
    }

}

?>
