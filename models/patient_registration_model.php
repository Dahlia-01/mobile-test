<?php
class patient_registration_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function chk_user($username,$email){

		$sth = $this->db->query("SELECT * FROM  patients_info WHERE username ='$username' AND email = '$email'");
		$count =  $sth->num_rows;
		return $count;
	}
	public function chk_username($username){

		$sth = $this->db->query("SELECT * FROM  patients_info WHERE username ='$username'");
		$count =  $sth->num_rows;
		return $count;
	}
	public function register_user($fullname,$username,$password,$password_recovery_question,$password_recovery_answer,$gender,$religion,$home_address,$occupation,$marital_status,$email,$phone,$date_created,$pix,$hash){
		$sql = "INSERT INTO patients_info (fullname,username,password,password_recovery_question,password_recovery_answer,gender,religion,home_address,occupation,marital_status,email,phone,date_created,pix,hash) VALUES ('$fullname','$username','$password','$password_recovery_question','$password_recovery_answer','$gender','$religion','$home_address','$occupation','$marital_status','$email','$phone','$date_created','$pix','$hash')";
		$this->db->query($sql);
	}
}
?>