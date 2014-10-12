<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Controller {

	public function index($type, $pre, $post)
	{
		$this->load->helper('url');
		$basic_url = uri_string();
		if($pre != "root")
			$basic_url = str_replace("$pre/", "", $basic_url);
		if(strstr($basic_url, ".css"))
			header("Content-Type: text/css");
		elseif(strstr($basic_url, ".js"))
			header("Content-Type: text/javascript");
		elseif(strstr($basic_url, ".jpg"))
			header("Content-Type: image/jpeg");
		elseif(strstr($basic_url, ".png"))
			header("Content-Type: image/png");
		//if($type == "images")
		//	header("Content-Type: image/jpeg");
		$this->load->view( $this->config->item("template") . "/" . $basic_url);
	}
}

/* End of file view.php */
/* Location: ./application/controllers/view.php */