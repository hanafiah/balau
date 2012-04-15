<?php

namespace Application\Models;

use Application\Vendors\Mongodb\mongodb;

class Model {

    public $db;

    public function __construct() {
        $m = mongodb::get_instance('localhost');
        // select a database
        $this->db = $m->comedy;
    }

}

