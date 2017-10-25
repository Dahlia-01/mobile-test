<?php

class Card_details extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
        $loggedtype = Session::get('loggedtype');
        
		$this->view->data['username']=Session::get('username');
		$this->view->data['pix']=Session::get('pix');
		$this->view->data['patient_id']=Session::get('patient_id');
                $this->view->data['unread']=Session::get('unread');
 
		if ($loggedtype !== "PATIENT") {
			Session::destroy();
			header('location: patient_login');
			exit;
		}
	}
	
	function index() 
	{        
		if (isset($_GET['card_id'])) {
			$card_id = base64_decode(urldecode($_GET['card_id']));
		$this->view->data['hospital_card']=$this->model->get_hospital_card($card_id);
		$this->view->data['post']=$this->model->get_latest_blog(3);
		$this->view->render('index/card_details', $noinclude=false, 1);	
        }
	}
}