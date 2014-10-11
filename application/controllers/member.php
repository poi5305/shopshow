<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function login_facebook()
	{
		if(!isset($_SESSION)) {session_start();}
		if(isset($_SESSION['user_account']))
		{
			$this->index();
			return;
		}
		
		$this->load->model("facebook", "fb");
		$fb_user = $this->fb->get_user_data("member/login_facebook");
		
		$this->load->database();
		$query = $this->db->get_where("user", array("account"=>$fb_user['id']));
		
		// user first login, and create account
		if($query->num_rows() == 0)
		{
			$data = array(
				"user_type" => 0 //0: user, 1:admin
				,"account_type" => 1 //0:default, 1:facebook
				,"account" => $fb_user["id"]
				,"email" => $fb_user["email"]
			);
			$this->db->insert("user", $data);
		}
		else
		{
			$data = $query->row_array();
		}
		$_SESSION['user_account'] = $fb_user['id'];
		$this->index($data);
	}
	public function login_default()
	{}
	public function register()
	{}
	public function login()
	{
		if(!isset($_SESSION)) {session_start();}
		if(isset($_SESSION['user_account']))
		{
			$this->index();
			return;
		}
		$this->load->model("facebook", "fb");
		$page = array(
			"view_banner" => array("view_empty", "")
			,"view_info" => array("view_empty", "")
			,"view_page" => array("view_page_member_login", "")
			,"facebook_login_url" => $this->fb->get_login_url("member/login_facebook")
		);
		$this->utility->createHtmlView($page);
	}
	public function logout()
	{
		if(!isset($_SESSION)) {session_start();}
		session_destroy();
		header("Location:".base_url());
	}

	public function index($user = NULL)
	{
		if(!isset($_SESSION)) {session_start();}
		
		if(!isset($_SESSION['user_account']))
		{
			$this->login();
			return;
		}
		$this->load->database();
		if(!is_array($user))
		{
			 $user = $this->get_user_from_db($_SESSION['user_account']);
		}
		$this->utility->createHtmlView();
	}
	private function get_user_from_db($user_account)
	{
		$this->load->database();
		$query = $this->db->get_where("user", array("account"=>$user_account));
		if($query->num_rows() == 0)
		{
			$this->login();
			exit();
		}
		return $query->row_array();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/shopshow.php */