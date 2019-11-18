<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    
    public function getNews()
    {
        $result = $this->db->getRows("SELECT title, description FROM news;");
        return $result;
    }
    
}
