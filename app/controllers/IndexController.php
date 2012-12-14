<?php
namespace app\controllers;

use System\baseController as baseController;

Class IndexController extends baseController
{
	public function __construct(){
		print '<br />Controller ' . __CLASS__ . ' loaded';
	}

	public function indexAction(){
		print '<Br />This is indexAction';
	}

	public function aboutAction(){
		print '<Br />This is aboutAction';
	}
}

?>