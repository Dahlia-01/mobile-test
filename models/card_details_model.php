<?php

class Card_details_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
    public function get_hospital_card($card_id)
	{
		$sth = $this->db->query("SELECT * FROM hospital_cards hospc left join patients_info pat on hospc.patient_id = pat.patient_id 
			left join hospitals hosp on hospc.hospital_id = hosp.hospital_id WHERE card_id = '$card_id'");
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