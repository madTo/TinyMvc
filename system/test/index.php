<?php

namespace system\test;
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

echo "The current page name is ".curPageName();

print '<br />PHP_SELT:' . $_SERVER['PHP_SELF'];

$uri = $_SERVER['PHP_SELF'];

$uri = explode('/', $uri);

print '<br />' . $uri[1];
