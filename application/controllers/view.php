<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {

	public function index($type, $pre, $post)
	{
		$this->load->helper('url');
		$basic_url = uri_string();
		if($pre != "root")
			$basic_url = str_replace("$pre/", "", $basic_url);
		if($type == "css")
			header("Content-Type: text/css");
		if($type == "images")
			header("Content-Type: image/jpeg");
		$this->load->view( $this->config->item("template") . "/" . $basic_url);
	}
}

/* End of file view.php */
/* Location: ./application/controllers/view.php */