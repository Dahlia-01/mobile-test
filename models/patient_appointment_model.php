<?php
class Patient_appointment_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getHospital($patient_id)
	{
		$sth = $this->db->query("SELECT DISTINCT hosp.hospital, hosp.hospital_id FROM hospital_cards card left join hospitals hosp on card.hospital_id = hosp.hospital_id WHERE patient_id = '$patient_id' AND activated = 'YES' ORDER BY hosp.hospital ASC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function gethospitals($patient_id)
	{
		$sth = $this->db->query("SELECT DISTINCT hosp.hospital FROM hospital_cards card left join hospitals hosp on card.hospital_id = hosp.hospital_id WHERE patient_id = '$patient_id' AND activated = 'YES' ORDER BY hosp.hospital ASC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function getTotalHospital($patient_id)
	{
		$sth = $this->db->query("SELECT DISTINCT hosp.hospital, hosp.hospital_id FROM hospital_cards card left join hospitals hosp on card.hospital_id = hosp.hospital_id WHERE patient_id = '$patient_id' AND activated = 'YES' ORDER BY hosp.hospital ASC");
            $rowss=$sth->num_rows;
            return $rowss;
	}
	public function getspecialties()
	{
		$sth = $this->db->query("SELECT * FROM specialty WHERE status = 1");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function gettotalspecialties()
	{
		$sth = $this->db->query("SELECT * FROM specialty WHERE status = 1");
            $rowss=$sth->num_rows;
            return $rowss;
	}
    public function create_appointment($appointment_type,$hospital,$doctor,$specialty,$date,$time,$patient_id,$txn_ref)
    {
        $sql = "INSERT INTO appointments (appointment_type,hospital,doctor,specialty,date,time,patient_id,txn_ref)
			VALUES ('$appointment_type','$hospital','$doctor','$specialty','$date','$time','$patient_id','$txn_ref')";

		 $this->db->query($sql);
    }
   	public function create_home_appointment($doctor,$hospital,$specialty,$patient_id,$date,$time,$txn_ref)
   	{
        $sql = "INSERT INTO home_consultation (doctor,hospital,specialty,patient_id,date,time,txn_ref)
			VALUES ('$doctor','$hospital','$specialty','$patient_id','$date','$time','$txn_ref')";
		 $this->db->query($sql);   		
   	}
	public function get_latest_blog($limit)
	{
		$sth = $this->db->query("SELECT * FROM  blog_posts ORDER BY post_id DESC LIMIT $limit");
		$out_put=$sth->rows;
		return $out_put;
	}
	public function chkExistingAppointment($patient_id,$date)
	{
		$sth = $this->db->query("SELECT * FROM appointments WHERE patient_id = '$patient_id' AND date = '$date'");
            $rowss=$sth->num_rows;
            return $rowss;		
	}
    public function getDoctorEmail($doctor)
    {
		$sth = $this->db->query("SELECT * FROM  doctors WHERE doctor_id = '$doctor'");
		$count=$sth->num_rows;
		if ($count>0){
		    $email = $sth->row['email'];
		    return $email;
		}
    }
    public function getDoctorName($doctor)
    {
		$sth = $this->db->query("SELECT * FROM doctors WHERE doctor_id = '$doctor'");
		$count=$sth->num_rows;
		if ($count>0){
		    $doctor = $sth->row['doctor'];
		    return $doctor;
		}
    }
    public function getHospital2($hospital)
    {
		$sth = $this->db->query("SELECT * FROM hospitals WHERE hospital_id = '$hospital'");
		$count=$sth->num_rows;
		if ($count>0){
		    $hospital = $sth->row['hospital'];
		    return $hospital;
		}    	
    }

}
?>