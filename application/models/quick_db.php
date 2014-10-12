<?php


class Quick_db extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	// For member
	public function get_user_by_account($user_account)
	{
		$this->load->database();
		$query = $this->db->get_where("user", array("account"=>$user_account));
		if($query->num_rows() == 0)
			return false;
		return $query->row_array();
	}	
	
}






















?>
