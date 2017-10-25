<?php

class Help extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$loggedid = Session::get('user_id');
		if ($logged == false) {
			Session::destroy();
			header('location: ../login');
			exit;
		}
	}
	
	function index() {
		$this->view->render('help/index');	
	}

	public function other($arg = false) {
		echo $arg;
		require 'models/help_model.php';
		$model = new Help_Model();
		$this->view->blah = $model->blah();
		
	}

}