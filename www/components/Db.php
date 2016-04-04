<?php

/**
 * Description of Db
 *
 * @author Алеша
 */
class Db {
    
    public static function getConnection(){
        
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $pcStr = "mysql:host=" . $params['host'] . ";dbname=" . $params['dbname'];
        
        $db = new PDO($pcStr, $params['user'], $params['password']);
        
        return $db;
    }
}
