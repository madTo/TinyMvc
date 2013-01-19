<?php
namespace publicDir;

/**Define Constants**/
define('BASE_PATH', dirname(dirname(realpath(__FILE__))) . '/');
define('VIEW_PATH', BASE_PATH . 'app/views/');

            
    /*Set Include Path to Base Path*/
    set_include_path(implode(PATH_SEPARATOR, array(
        realpath(BASE_PATH),
        get_include_path())
    ));
    
    /**Initialize Autoloader**/
    spl_autoload_register(include BASE_PATH . 'config/autoloader.php');
    
    /**Dispatch The URL**/
    $routes = new \system\Dispatch();
    $routes->dispatch();

    /**Config**/
    $config = \config\Config::setValue('Controller', \system\Dispatch::getControllerName());
    $config = \config\Config::setValue('Action', \system\Dispatch::getActionName());
    
    

    print '<br />Controller is ' . \config\Config::getValue('Controller');
    print '<br />Action is ' . \config\Config::getValue('Action');