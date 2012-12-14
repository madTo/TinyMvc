<?php
return function($class) 
{
    $filepath = str_replace('\\', '/', $class) . '.php';
    if (file_exists(BASE_PATH . $filepath)) {
        require_once BASE_PATH . $filepath;
    }
};