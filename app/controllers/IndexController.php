<?php
namespace app\controllers;

use system\baseController;

Class IndexController extends baseController
{
	public function indexAction(){
            $view = new \system\View();
            $view->header = 'this is my header';
            $view->footer = 'this is my footer';
            $view->setTemplate('indexView');
            
	}

	public function aboutAction(){
		print '<Br />This is aboutAction';
	}
}

?>