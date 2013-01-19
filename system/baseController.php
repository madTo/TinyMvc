<?php

namespace system;

use system\DataBase;

class baseController
{
	protected $_instances = array();


	public function __construct(){
            
	}
        
        public function getDB(){
            return DataBase::getDB();
        }



}
?>