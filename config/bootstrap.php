<?php
//system\BaseControllers::loadControleer(Dispatch::getControllerName());
class Bootstrap{

	public function Initialize(){

		/*Set Include Path to Base Path*/
		set_include_path(implode(PATH_SEPARATOR, array(
		    realpath(BASE_PATH),
		    get_include_path())
		));

		/**Initialize Autoloader**/
		spl_autoload_register(include BASE_PATH . 'config/autoloader.php');

		/**Dispatch The URL**/
		$routes = system\Dispatch::dispatch();

		/**Config**/
		$config = config\Config::setValue('Controller', system\Dispatch::getControllerName());
		$config = config\Config::setValue('Action', system\Dispatch::getActionName());
	}

	public function getUrlInfo(){
		print '<br />Controller is ' . config\Config::getValue('Controller');
		print '<br />Action is ' . config\Config::getValue('Action');
	}
}