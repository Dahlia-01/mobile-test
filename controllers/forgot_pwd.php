<?php

class Forgot_pwd extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() 
	{			
		$this->view->render('patient_login/forgot_pwd', $noinclude=true, 0);		
	}
}