<?php

class DatabaseConnect {
    
    static private $_instance;
    
    private function __construct() {
        $conn = mysql_connect('localhost', 'root', '');
        $db = mysql_select_db('social', $conn);
        
        mysql_query('SET NAMES utf8');
    }
    
    static function getInstance() {
        if (self::$_instance == null)
            self::$_instance = new DatabaseConnect();
        return self::$_instance;
    }
    
    public function query($sql)
    {
         $result = mysql_query($sql);
         return $result;
    }
}

function query($sql)
{
    $config = DatabaseConnect::getInstance();
    $result = $config->query($sql);
    return $result;
}
