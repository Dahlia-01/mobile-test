<?php

class Index extends Controller {

	function __construct() {

		parent::__construct();
		Session::init();
        $logged = Session::get('loggedIn');
        $loggedtype = Session::get('loggedtype');
        
        $this->view->data['username']=Session::get('username');
        $this->view->data['pix']=Session::get('pix');
        $this->view->data['patient_id']=Session::get('patient_id');
        $this->view->data['unread']=Session::get('unread');
        
        if ($logged == true) {
        if ($loggedtype !== "PATIENT") {
            Session::destroy();
            header('location: patient_login');
            exit;
        }
        } else {
            Session::destroy();
            header('location: patient_login');
            exit;            
        }
        
    }
    
    function index() 
    {	
        if (isset($_SESSION['patient_id'])) {
            $patient_id = $_SESSION['patient_id'];
            $this->view->data['total_pending_consultation']=$this->model->get_total_pending_consultations($patient_id);
            $this->view->data['medical_record']=$this->model->getMedicalRecords($patient_id);
            $this->view->data['total_medical_record']=$this->model->getTotalMedicalRecords($patient_id);
            $this->view->data['pending_consultation']=$this->model->get_pending_consultations($patient_id);
            $this->view->data['total_past_consultation']=$this->model->get_total_past_consultations($patient_id);
            $this->view->data['past_consultation']=$this->model->get_past_consultations($patient_id);
            $this->view->data['total_pending_appointment']=$this->model->get_total_pending_appointments($patient_id);
            $this->view->data['total_past_appointment']=$this->model->get_total_past_appointments($patient_id);
            $this->view->data['total_hospital_card']=$this->model->get_total_hospital_cards($patient_id);
            $this->view->data['pending_appointment']=$this->model->get_pending_appointments($patient_id);
            $this->view->data['past_appointment']=$this->model->get_past_appointments($patient_id);
            $this->view->data['hospital_card']=$this->model->get_hospital_cards($patient_id);
            $this->view->data['patient_info']=$this->model->get_patient_info($patient_id);
        }
        $this->view->data['post']=$this->model->get_latest_blog(3);
        $this->view->render('index/index', $noinclude=false, 1);
    }

    function updateProfile()
    {        
        function validate_input($data) {
            $data = trim($data);
            $data = addslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if(isset($_POST['fullname'])) {
            $fullname=validate_input($_POST['fullname']);
            $username=validate_input($_POST['username']);
            $email=validate_input($_POST['email']);
            $phone=validate_input($_POST['phone']);
            $marital_status=validate_input($_POST['marital_status']);
            $occupation=validate_input($_POST['occupation']);
            $home_address=validate_input($_POST['home_address']);
            $patient_id = $_SESSION['patient_id'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $check=$this->model->check_existing_username($username,$patient_id);
                if($check>0){
                    echo "Username already exists";
                }else{
                    $this->model->updatePatientInfo($fullname,$username,$email,$phone,$marital_status,$occupation,$home_address,$patient_id);
                    Session::set('username', $username);
                    Session::set('fullname', $fullname);
                    Session::set('email', $email);
                    Session::set('phone', $phone);
                    Session::set('marital_status', $marital_status);
                    Session::set('home_address', $home_address);
                    Session::set('occupation', $occupation);
                    header("location: ../index");
                }} else {
                    echo "Invalid Email Address";
                }}
            }

            function delete_appointment()
            {
        if (isset($_POST['appointment_id'])) {
            $appointment_id = $_POST['appointment_id'];
            $this->model->deleteAppointment($appointment_id);
            header("location: ../landing_page");
        }
     }

        function changePhoto()
        {
                if (isset($_POST['patient_id'])) {
                       $patient_id = $_POST['patient_id'];
                        $old_pic = $this->model->get_old_pix($patient_id);
                        if ($old_pic !== 'profile.png') {
                        unlink('public/img/patients/'.$old_pic);
                        $pix=($_FILES['photo']['name']);
                        $target = "public/img/patients/";
                        $target = $target . basename( $_FILES['photo']['name']);
                        $this->model->change_pix($patient_id,$pix);
                        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        Session::set('pix', $pix);
        header("location: ../index");
                        }else{
                        $pix=($_FILES['photo']['name']);
                        $target = "public/img/patients/";
                        $target = $target . basename( $_FILES['photo']['name']);
                        $this->model->change_pix($patient_id,$pix);
                        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        Session::set('pix', $pix);
        header("location: ../index");
                }}
        }
 }