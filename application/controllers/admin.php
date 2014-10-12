<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index($pre_page_data = NULL)
	{
		if(!isset($_SESSION)) {session_start();}
		if(!(isset($_SESSION['user_account']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] == 0 ))
		{
			header("Location:".base_url());
			return;
		}
		$page = array(
			"view_banner" => array("view_empty", "")
			,"view_info" => array("view_empty", "")
			,"view_page" => array("view_page_admin", "")
			,"view_admin" => array("view_page_admin_index", "")
			,"pre_page_data" => $pre_page_data
		);
		$this->utility->createHtmlView($page);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/admin.php */