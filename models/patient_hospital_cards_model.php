<?php
class Patient_hospital_cards_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getHospitalCards($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM  hospital_cards hospc left join hospitals hosp on hospc.hospital_id = hosp.hospital_id 
		left join patients_info pat on hospc.patient_id = pat.patient_id WHERE hospc.patient_id = '$patient_id' ORDER BY card_id DESC");
		$out_put=$sth->rows;
		return $out_put;
	}
	public function getHospitals()
	{
		$sth = $this->db->query("SELECT * FROM hospitals WHERE status = 1 ORDER BY hospital ASC");
            $rowss=$sth->rows;
            return $rowss;
	}
	public function getStates()
	{
		$sth = $this->db->query("SELECT * FROM states WHERE status = 1 ORDER BY state ASC");
            $rowss=$sth->rows;
            return $rowss;
	}
    public function create_card($hospital_id,$patient_id,$business_address,$dob,$age,$tribe,$state_of_origin,$nok,$nok_phone,$nok_address,$nok_relationship)
    {        
		$sql = "INSERT INTO hospital_cards (hospital_id,patient_id,business_address,dob,age,tribe,state_of_origin,nok,nok_phone,nok_address,nok_relationship)
			VALUES ('$hospital_id','$patient_id','$business_address','$dob','$age','$tribe','$state_of_origin','$nok','$nok_phone','$nok_address','$nok_relationship')";

		 $this->db->query($sql);
    }

}
?>