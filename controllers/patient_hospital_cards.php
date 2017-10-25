<?php

class Patient_hospital_cards extends Controller {

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
	
	function index() 
	{	
		$this->view->data['hospital']=$this->model->getHospitals();
        $this->view->data['state']=$this->model->getStates();
		if (isset($_SESSION['patient_id'])) {
		$patient_id = $_SESSION['patient_id'];
		$this->view->data['hospital_cards']=$this->model->getHospitalCards($patient_id);
	}
		$this->view->render('index/hospital_cards', $noinclude=false, 1);
}

    function create_new_card()
    {  
function validate_input($data) {
    $data = trim($data);
    $data = addslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        if(isset($_POST['hospital_id'])){
            $hospital_id = $_POST['hospital_id'];
            $patient_id = $_SESSION['patient_id'];
            $business_address = validate_input($_POST['business_address']);
            $dob = $_POST['dob'];
            $age = $_POST['age'];
            $tribe = validate_input($_POST['tribe']);
            $state_of_origin = $_POST['state_of_origin'];
            $nok = validate_input($_POST['nok']);
            $nok_phone = validate_input($_POST['nok_phone']);
            $nok_address = validate_input($_POST['nok_address']);
            $nok_relationship = $_POST['nok_relationship'];
            
                $this->model->create_card($hospital_id,$patient_id,$business_address,$dob,$age,$tribe,$state_of_origin,$nok,$nok_phone,$nok_address,$nok_relationship);
                            header("location: ../landing_page");
            
        }
    }
}