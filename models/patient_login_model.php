<?php
class patient_login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function chk_user($username){

		$sth = $this->db->query("SELECT * FROM  patients_info WHERE username ='$username' AND validated_email = 1");
		$count =  $sth->num_rows;
		return $count;
	}
	public function get_total_hospital_cards($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM hospital_cards WHERE patient_id='$patient_id' and activated = 'YES'");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function login_user($username,$password)
	{
		$sth = $this->db->query("SELECT * FROM  patients_info WHERE username ='$username' AND password = '$password'");
		$count =  $sth->num_rows;
		if ($count > 0) {
            $patient_id =  $sth->row['patient_id'];
		    $email = $sth->row['email'];
		    $phone = $sth->row['phone'];
		    $password = $sth->row['password'];
			$username =	$sth->row['username'];
			$fullname = $sth->row['fullname'];
			$pix = $sth->row['pix'];
		    $gender = $sth->row['gender'];
		    $religion = $sth->row['religion'];
		    $home_address = $sth->row['home_address'];
			$occupation =	$sth->row['occupation'];
			$marital_status = $sth->row['marital_status'];
			$pix = $sth->row['pix'];

			Session::init();
			Session::set('loggedIn', true);
			Session::set('loggedtype', 'PATIENT');
			Session::set('username', $username);
			Session::set('patient_id', $patient_id);
			Session::set('fullname', $fullname);
			Session::set('gender', $gender);
			Session::set('religion', $religion);
			Session::set('password', $password);
			Session::set('home_address', $home_address);
			Session::set('occupation', $occupation);
			Session::set('marital_status', $marital_status);
			Session::set('email', $email);
			Session::set('phone', $phone);
			Session::set('pix', $pix);
		}	
	}
	public function unread()
	{
		$sql = $this->db->query("SELECT * FROM  patient_messages WHERE status = 'unread'");
		$unread=$sql->num_rows;
			Session::set('unread', $unread);
	}
}
?>