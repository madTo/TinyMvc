<?php

/**Define Constants**/
define('BASE_PATH', dirname(dirname(realpath(__FILE__))) . '/');
define('VIEW_PATH', dirname(realpath(__FILE__)) . 'app/views/');

/**Include Bootstrap**/
require_once BASE_PATH . 'config/bootstrap.php';

$bootstrap = new Bootstrap();

/**Initialize Bootstrap**/
$bootstrap->Initialize();

/**Print URL info**/
$bootstrap->getUrlInfo();