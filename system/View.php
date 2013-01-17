<?php
namespace system;

use system\ViewInterface;

class View implements ViewInterface{

	const DEFAULT_TEMPLATE = "default.php";

	protected $template;
	protected $fields = array();

	 /**
	  * @param str array
	  */
	public function __construct($template = null, array $fields = array()){

		if($template !== null)
		{
			$this->setTemplate($template);
		}

		if(!empty($fields))
		{
			foreach($fields as $key=>$value)
			{
				$this->$key = $value;
			}
		}
	}

	/**
	 * @param string
	 */
	public function setTemplate($template){

                $template = VIEW_PATH .$template.'.php';

		if(!is_file($template) || !is_readable($template)){
			die("<br />The template '$template' is invalid");
		}else{
                    $this->template = $template;
                    require_once $this->getTemplate(); 
                }

	}

	public function getTemplate(){
		return $this->template;
	}

	public function __set($name, $value) {
		$this->$name = $value;
		return $this;
	}
		     
	public function __get($name) {
	        if (!isset($this->$name)) {
	            die("Unable to get the field $name");
	        }
	        $field = $this->$name;
	        return $field instanceof \Closure ? $field($this) : $field;
	}

	public function __isset($name){
		return isset($this->fields[$name]);
	}

	public function __unset($name){
		if(!isset($this->fields[$name])){
			throw new Exception("unable to unset field $name");
		}
		unset($this->fields[$name]);
		return $this;
	}

	public function render(){
		extract($this->fields);
		ob_start();
		return ob_get_clean();
	}
}

?>