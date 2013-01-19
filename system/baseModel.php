<?php

namespace system;



class baseModel
{
    public function __set($name, $value) {
        if(property_exists($this, $name)){
            $this->$name = $value;
        }else{
            die('Field ' . $name . ' doesnt exists!');
        }    
    }

    public function __get($name) {
        if(property_exists($this, $name)){
            return $this->$name;
        }
    }
    
    /**
    *Description 
    *@param void
    *@return DB connection object
    **/
    public  function getDB(){
        
    }
}