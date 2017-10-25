<?php

class landing_page_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
    public function delete_appointment($appointment_id)
    {        
		$sql = "DELETE FROM appointments WHERE appointment_id = '$appointment_id'";
		$this->db->query($sql);
    }
	public function check_existing_username($username,$patient_id)
	{
		$sth = $this->db->query("SELECT * FROM patients_info WHERE username='$username' AND patient_id != '$patient_id'");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function updatePatientInfo($fullname,$username,$password,$email,$phone,$marital_status,$occupation,$home_address,$patient_id)
	{
		$sql = "UPDATE patients_info SET fullname = '$fullname', username = '$username', password = '$password', email = '$email', phone = '$phone', marital_status = '$marital_status', occupation = '$occupation', home_address= '$home_address' WHERE patient_id = '$patient_id'";
		$this->db->query($sql);
	}
	public function get_total_pending_consultations($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM home_consultation WHERE (patient_id='$patient_id' AND status = 'pending') OR (patient_id='$patient_id' AND status = 'fixed')");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function get_total_past_consultations($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM home_consultation WHERE (patient_id='$patient_id' AND status = 'past') OR (patient_id='$patient_id' AND status = 'completed')");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function get_pending_consultations($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM home_consultation WHERE (patient_id='$patient_id' AND status = 'pending') OR (patient_id='$patient_id' AND status = 'fixed') ORDER BY date DESC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function get_past_consultations($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM home_consultation WHERE (patient_id='$patient_id' AND status = 'past') OR (patient_id='$patient_id' AND status = 'completed') ORDER BY date DESC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function get_pending_appointments($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM appointments WHERE (patient_id='$patient_id' AND status = 'pending') OR (patient_id='$patient_id' AND status = 'fixed') ORDER BY date DESC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function get_past_appointments($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM appointments WHERE (patient_id='$patient_id' AND status = 'past') OR (patient_id='$patient_id' AND status = 'completed') ORDER BY date DESC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function get_hospital_cards($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM hospital_cards WHERE patient_id='$patient_id' AND activated = 'YES' ORDER BY card_id DESC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function get_total_pending_appointments($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM appointments WHERE (patient_id='$patient_id' AND status = 'pending') OR (patient_id='$patient_id' AND status = 'fixed')");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function get_total_past_appointments($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM appointments WHERE (patient_id='$patient_id' AND status = 'past') OR (patient_id='$patient_id' AND status = 'completed')");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function get_total_hospital_cards($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM hospital_cards WHERE patient_id='$patient_id'");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function get_patient_info($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM patients_info WHERE patient_id='$patient_id'");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function get_latest_blog($limit)
	{
		$sth = $this->db->query("SELECT * FROM  blog_posts ORDER BY post_id DESC LIMIT $limit");
		$out_put=$sth->rows;
		return $out_put;
	}
   
}
?>