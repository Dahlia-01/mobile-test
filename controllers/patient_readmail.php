<?php

class Patient_readmail extends Controller {

	function __construct() {
		parent::__construct();
		
		Session::init();
		$logged = Session::get('loggedIn');
        $loggedtype = Session::get('loggedtype');
        
		$this->view->data['gender']=Session::get('gender');
		$this->view->data['username']=Session::get('username');
		$this->view->data['fullname']=Session::get('fullname');
		$this->view->data['email']=Session::get('email');
		$this->view->data['phone']=Session::get('phone');
		$this->view->data['pix']=Session::get('pix');
		$this->view->data['patient_id']=Session::get('patient_id');
		$this->view->data['marital_status']=Session::get('marital_status');
                $this->view->data['home_address']=Session::get('home_address');
                $this->view->data['occupation']=Session::get('occupation');
                $this->view->data['unread']=Session::get('unread');
 
		if ($loggedtype !== "PATIENT") {
			Session::destroy();
			header('location: patient_login');
			exit;
		}
	}
	
	function index() {
		if (isset($_GET['msg_id'])) {
			$msg_id = base64_decode(urldecode($_GET['msg_id']));
			$this->view->data['msg']=$this->model->get_msg($msg_id);
		}
		$this->view->data['post']=$this->model->get_latest_blog(3);
        $this->view->render('index/readmail',$noinclude=false,1);
	}
	
	function mark_as_read()
 	{
        if (isset($_POST['msg_id'])) {
        $msg_id = $_POST['msg_id'];
        $this->model->mark_msg_as_read($msg_id);
		$this->model->unread();
		header('location: ../patient_mailbox');
	}
}
	
	
}