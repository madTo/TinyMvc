<?php

namespace system;

class DataBase
{
    public static $_DbConnection = null;
    

    
    public static function getDB(){
        $config = parse_ini_file(BASE_PATH . "config/config.ini");
        if(is_array($config)){
            if(isset($config['dsn']) && isset($config['username']) && isset($config['password'])){
                
                if(self::$_DbConnection == null){
                    self::setDbConnection(new \PDO($config['dsn'],$config['username'],$config['password']));
                }
                
                return self::$_DbConnection;
            }
        }else{
            die("No DB configuration data found! Please check your config.ini at <br />" 
                .BASE_PATH . "config/config.ini" );
        }
    }
    
    public function setDbConnection($obj){
        self::$_DbConnection = $obj;
    }
}

?>
