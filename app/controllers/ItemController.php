<?php

namespace app\controllers;

use System\baseController as baseController;

Class ItemController extends baseController
{
	public function __construct(){
		print '<br />Controller ' . __CLASS__ . ' loaded';
	}

	public function indexAction(){

	}

	public function secondAction(){
		print second;
	}

	public function read(){
		$id = $_GET['id'];

		$result = $model->selectNews($id);

		$this->load->view("readNews", $result)
	}

}

?>