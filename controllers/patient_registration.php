<?php

class patient_registration extends Controller {


	function __construct() {
		parent::__construct();		
	}
	
	function index() 
	{			
		$this->view->render('patient_login/registration', $noinclude=true,0);
	}
    
    
 	function register()
 	{
function validate_input($data) {
    $data = trim($data);
    $data = addslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 		if(isset($_POST['username'])){
 			$fullname=validate_input($_POST['fullname']);
        $username=validate_input($_POST['username']);
$pass1 = validate_input($_POST['password']);
		$password=md5(validate_input($_POST['password']));
		$email = validate_input($_POST['email']);
		$phone = validate_input($_POST['phone']);
		$gender = validate_input($_POST['gender']);
		$religion = validate_input($_POST['religion']);
		$marital_status = validate_input($_POST['marital_status']);
		$home_address = validate_input($_POST['home_address']);
		$occupation = validate_input($_POST['occupation']);
		$password_recovery_question = validate_input($_POST['password_recovery_question']);
		$password_recovery_answer = validate_input($_POST['password_recovery_answer']);
		$hash = md5( rand(0,1000) );
		$date_created = date('Y-m-d');
		$check1=$this->model->chk_user($username,$email);
		if ($check1>0){
			echo "You already have an account, Please <a href='/patient_login'>Login</a> with your username and password";
		}else{
		$check2=$this->model->chk_username($username);
		if ($check2>0){
			echo "This username is already in use, Please try another";
		}else{
		$this->model->register_user($fullname,$username,$password,$password_recovery_question,$password_recovery_answer,$gender,$religion,$home_address,$occupation,$marital_status,$email,$phone,$date_created,$hash);
		$message = 'Thanks for signing up! Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
<br>
Username: '.$username.'
<br>
Password: '.$pass1.'
<br>
 
Please click this link to activate your account:
www.kompletecare.com/patients_verify?email='.$email.'&hash='.$hash.''; // Our message above including the link
                     
include("smtptester/class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"
 
$mail = new PHPMailer();
 
$mail->IsSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'mail.kompletecare.com';

$mail->Username = 'dahlia.akhaine@kompletecare.com';
$mail->Password = 'AKHAINE_01'; 
 
$mail->From = 'dahlia.akhaine@kompletecare.com';
$mail->FromName = "Sevenz Healthcare Services Ltd";
 
$mail->AddAddress($email, $username);
$mail->Subject = "Patient Registration";
$mail->Body = $message;
$mail->WordWrap = 150;
$mail->IsHTML(true);
$str1= "gmail.com";
$str2=strtolower('dahlia.akhaine@kompletecare.com');
If(strstr($str2,$str1))
{
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
echo "<br><br> * Please double check the user name and password to confirm that both of them are correct. <br><br>";
echo "* If you are the first time to use gmail smtp to send email, please refer to this link :http://www.smarterasp.net/support/kb/a1546/send-email-from-gmail-with-smtp-authentication-but-got-5_5_1-authentication-required-error.aspx?KBSearchID=137388";
} 
else {
	header('location: ../patient_login');
}
}
else{
	$mail->Port = 25;
	if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
echo "<br><BR>* Please double check the user name and password to confirm that both of them are correct. <br>";
} 
else {
	header('location: ../patient_login');
}
}  
		}}
	}
 	}
}