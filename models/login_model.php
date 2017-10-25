<?php
class login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function login_user($username,$password)
	{
		$sth = $this->db->query("SELECT * FROM  admin WHERE username ='$username' AND password = '$password'");
		$count =  $sth->num_rows;
		if ($count > 0) {
            $count1 =  $sth->row['admin_id'];
		    $details=  $sth->row['details'];
		    $email = $sth->row['email'];
		    $phone = $sth->row['phone'];
			$logname=	$sth->row['username'];
			$fullname = $sth->row['fullname'];
			$pix = $sth->row['pix'];

			Session::init();
			Session::set('loggedIn', true);
			Session::set('loggedUser', $logname);
			Session::set('admin_id', $count1);
			Session::set('fullname', $fullname);
			Session::set('user_details', $details);
			Session::set('email', $email);
			Session::set('phone', $phone);
			Session::set('pix', $pix);
           // echo '<script> location.replace("../dashboard"); </script>';
		}	
	}
	public function unread()
	{
		$sql = "SELECT * FROM  messages WHERE status = 'unread'";
		$unread=$sql->num_rows;
			Session::set('unread', $unread);
	}
}
?>