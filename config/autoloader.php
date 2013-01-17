<?php
return function($class) 
{
    $filepath = str_replace('\\', '/', $class) . '.php';

//    print BASE_PATH . '    IS THE BASE PATH <BR />';
//    print $filepath . '    IS THE FILE PATH <BR />';
//    print BASE_PATH . $filepath . '    IS THE FINAL PATH <BR />';

    if (file_exists(BASE_PATH . $filepath)) {
        require_once BASE_PATH . $filepath;
    }
//    else{
//        die('not found');
//    }
};