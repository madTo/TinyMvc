<?php
namespace app\controllers;

use system\baseController;

Class IndexController extends baseController
{
	public function indexAction(){
            $view = new \system\View();

            
            $tasksModel = new \app\models\TasksModel();
            
            $db = $this->getDB();
            $result = $db->query("SELECT * FROM tasks");

            $view->header = 'this is my header';
            $view->footer = 'this is my footer';
            $view->tasks = $result;
            $view->setTemplate('indexView');
	}

	public function aboutAction(){
		print '<Br />This is aboutAction';
	}
}

?>