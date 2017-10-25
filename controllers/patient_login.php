<?php
class patient_login extends Controller {


	function __construct() {
		parent::__construct();		
	}
	
	function index() 
	{			
		$this->view->render('patient_login/index', $noinclude=true,0);
	}
    
    
 	function login()
 	{
function validate_input($data) {
    $data = trim($data);
    $data = addslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 		if(isset($_POST['username'])){
        $username=validate_input($_POST['username']);
		$password=validate_input($_POST['password']);
		$check=$this->model->chk_user($username);
		if ($check>0){
		$this->model->login_user($username,$password);
		$this->model->unread();
    header('location: ../landing_page');

// $phone = '07051365997';
// $message = 'Thanks for signing up! Your account has been created, you can login with the following credentials after you have activated your account';
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.infobip.com/sms/1/text/single",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{ \"from\":\"KompletCare\", \"to\":\"2348177122705\", \"text\":\"Test SMS.\" }",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: Basic U2V2ZW56OktvbXBsZXRlY2FyZUAyMzQ=",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
}
}
}