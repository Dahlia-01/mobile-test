<?php
class Patient_mailbox_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function old_msg($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM  patient_messages WHERE status = 'read' AND patient_id = '$patient_id' ORDER BY msg_id DESC");
		$out_put=$sth->rows;
		return $out_put;
	}
	public function new_msg($patient_id)
	{
		$sth = $this->db->query("SELECT * FROM  patient_messages WHERE status = 'unread' AND patient_id = '$patient_id' ORDER BY msg_id DESC");
		$out_put=$sth->rows;
		return $out_put;
	}
	public function get_latest_blog($limit)
	{
		$sth = $this->db->query("SELECT * FROM  blog_posts ORDER BY post_id DESC LIMIT $limit");
		$out_put=$sth->rows;
		return $out_put;
	}

}
?>