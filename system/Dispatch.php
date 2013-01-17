<?php
namespace system;

class Dispatch
{
	//Paths to current controller & view
	protected static $_paths = array();
	//Current Controller Name
	protected static $_controllerName;
	//Current Action
	protected static $_actionName;

	/*
	*@return: $_ControllerName
	*/
	public static function getControllerName(){
		return static::$_controllerName;
	}
	/*
	*@return: $_actionName
	*/
	public static function getActionName(){
		return static::$_actionName;
	}
	/*Define Controller from URL
	*@params: void
	*/
	public static function dispatch()
	{
		//Get URL 
		$url = $_SERVER['PHP_SELF'];
		$url = explode('/', $url);

		//Make first element 'index.php'
		while($url[0] != 'index.php'){
			array_shift($url);
		}

		//Set Controller
		if(isset($url[1]) && strlen($url[1])>0){
			static::$_controllerName = $url[1]; //Controller Name
		}else{
			static::$_controllerName = 'Index';
		}


		//Set Action
		if(isset($url[2]) && strlen($url[2])>0){
			static::$_actionName = $url[2];
		}else{
			static::$_actionName = 'index';
		}

		//Include Controller&View
		static::checkRoute(static::$_controllerName, static::$_actionName);

		//Instaciate Controller
		self::callRequestedObject(static::$_controllerName, static::$_actionName);
	}

	/**
	*@Check if route elements exists
	*@params: string
	*/
	public static function checkRoute($controllerName, $actionName = false)
	{
		//Check if Controller and View Exist
		self::checkController($controllerName);
		self::checkView($controllerName, $actionName);
	}

	/**
	 *@Check if controller exist
	 *@params: string
	 *@return bool
	 */
	protected function checkController($controller)
	{
		//Build Controller path
		$controllerPath = BASE_PATH . 'app/controllers/' . $controller . 'Controller.php';	
		if(file_exists($controllerPath)){
			static::$_paths['controller'] = $controllerPath;
			return true;
		}else{
			die($controller . 'Controller Dont Exist');
		}
	}

	/**
	 *@Check if view exist
	 *@params: string
	 *@return bool
	 */
	protected function checkView($controller, $actionName)
	{
		//Build View Path
		$viewPath = BASE_PATH . 'app/views/' . $controller . '/' . $actionName . '.phtml';	
		if(file_exists($viewPath)){
			static::$_paths['view'] = $viewPath;
			return true;
		}else{
			die('<br />' . $controller . "Controller View Dont Exist");
		}
	}

	
	/*
	*Instanciate the requested ControllerAction
	*@params: 
	*/
	protected function callRequestedObject($controllerName, $actionName)
	{
                
		$controllerName = 'app\controllers\\' . $controllerName . 'Controller';

		$actionName = $actionName . 'Action';


		$controller = new $controllerName();
		$controller->$actionName();
	}


}