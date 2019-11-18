<?php

namespace application\core;

use application\lib\Database;

abstract class Model 
{
    
    public $db;
    
    public function __construct()
    {
        $config = require 'application/config/db.php';
        $this->db = new Database($config['host'], $config['dbname'], $config['user'], $config['password']);
    }
    
}
