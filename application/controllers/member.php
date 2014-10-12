<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	var $magic = "-5566-";
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
		if(!$fb_user)
		{
			$this->login();
			return;
		}
		$this->load->database();
		$user = $this->quick_db->get_user_by_account($fb_user['id']);
		if(!$user)
		{
			$user = array(
				"user_type" => 0 //0: admin, 1:user, 9:ban_user
				,"account_type" => 1 //0:default, 1:facebook
				,"account" => $fb_user["id"]
				,"email" => $fb_user["email"]
			);
			$this->db->insert("user", $user);
		}
		$_SESSION['user_account'] = $fb_user['id'];
		$_SESSION['user_type'] = $user['user_type'];
		$this->index($user);
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
	public function update()
	{
		if(!isset($_SESSION)) {session_start();}
		if(!isset($_SESSION['user_account']))
		{
			$this->login();
			return;
		}
		
		$data = array(
			"email" => htmlspecialchars($_POST["email"])
			,"name1" => htmlspecialchars($_POST["name1"])
			,"telephone1" => htmlspecialchars($_POST["telephone1"])
			,"region1" => htmlspecialchars($_POST["region1"])
			,"address1" => htmlspecialchars($_POST["address1"])
		);
		
		$message = 1;
		if(	isset($_POST["o_passwd"])
			&& isset($_POST["n1_passwd"])
			&& isset($_POST["n2_passwd"])
			&& ($_POST["o_passwd"]||$_POST["n1_passwd"]||$_POST["n2_passwd"])
		)
		{
			$user = $this->quick_db->get_user_by_account($_SESSION['user_account']);
			if($_POST["n1_passwd"] != $_POST["n2_passwd"])
				$message = 2;
			if($user["password"] != md5($_POST["o_passwd"].$this->magic.$_SESSION['user_account']))
				$message = 3;
			if( strlen($_POST["n1_passwd"]) < 8 ) 
				$message = 4;
			if($message == 1)
				$data["password"] = md5($_POST["n1_passwd"].$this->magic.$_SESSION['user_account']);
		}
		
		$this->load->database();
		$this->db->update("user", $data, "account = '{$_SESSION['user_account']}'");
		$this->index(NULL, $message);
	}

	public function index($user = NULL, $pre_page_data = NULL)
	{
		if(!isset($_SESSION)) {session_start();}
		
		if(!isset($_SESSION['user_account']))
		{
			$this->login();
			return;
		}
		if(!is_array($user))
		{
			$user = $this->quick_db->get_user_by_account($_SESSION['user_account']);			
		}
		if(!$user)
		{
			$this->login();
			return;
		}
		$page = array(
			"view_banner" => array("view_empty", "")
			,"view_info" => array("view_empty", "")
			,"view_page" => array("view_page_member_info", "")
			,"user" => $user
			,"pre_page_data" => $pre_page_data
		);
		$this->utility->createHtmlView($page);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/member.php */