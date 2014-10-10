<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function login()
	{
		$page = array(
			"view_banner" => array("view_empty", "")
			,"view_info" => array("view_empty", "")
			,"view_page" => array("view_page_member_login", "")
		);
		$this->utility->createHtmlView($page);
	}
	public function logout()
	{
		
	}

	public function index()
	{	
		$this->utility->createHtmlView();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/shopshow.php */