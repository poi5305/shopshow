<?php

class Utility extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function bg_curl($url)
	{
		$this->log("msg", __CLASS__.".".__FUNCTION__, "bg-curl", "BG CURL", "$url");
		shell_exec("nohup curl -k \"$url\" >/dev/null 2>&1 &");
		return true;
	}
	
	// For Log and Error handler
	var $debug = true;
	var $info = true;
	var $log_file_name = "logs";
	
	var $session_time = NULL;
	function log($status = "info", $function_name="unknow", $app_name="unknow", $title="unknow", $content="unknow")
	{
		// msg 重要記錄
		// info 普通訊息
		// 0 die 死機 
		// 1 error 告知使用者
		// 2 debug
		
		if($status=="info" && $this->info == false)
			return;
		if($status=="debug" && $this->debug == false)
			return;
		$this->printer($status, $app_name, $function_name, $title, $content);
		
	}
	function log_format(&$status, &$app_name, &$function_name, &$title, &$content)
	{
		return date("Y-m-d H:i:s", time())."\t$status\t".substr(session_id(),0,12)."\t$app_name\t$function_name\t$title\t$content\n";
	}
	
	function printer(&$status, &$app_name, &$function_name, &$title, &$content)
	{
		if(session_id() == '')
			session_start();
		
		// insert to log files
		$text = $this->log_format($status, $app_name, $function_name, $title, $content);
		file_put_contents($this->log_file_name, $text, FILE_APPEND);
		
		// insert to database
		$this->load->database();
		
		$data = Array(
			"status"				=> $status,
			"app_name"				=> $app_name,
			"function_name"			=> $function_name,
			"title"					=> $title,
			"content"				=> $content,
			"session_id"			=> session_id(),
			"time"					=> date( "Y-m-d H:i:s", time())
		);
		
		$sql = $this->db->insert_string('logs', $data);
		$this->db->query($sql);
		
		// CI default log
		if($status=="die" || $status=="error" || $status=="mail")
			log_message("error", $text);
		if($status=="debug")
			log_message("debug", $text);
		if($status=="msg")
			log_message("info", $text);
			
		if($status=="die")
			show_error("Error !~ $title $content");
		
			
		if($status=="error")
		{
			$pages['sub_menu'] = $this->load->view("basespace/view_basespace_sub_menu.php",'', true );
			$pages['main_page'] = $this->load->view("basespace/view_basespace_error.php", array('error_h2'=>$title, 'error_p'=>$content), true);
			$this->createHtmlView($pages);
			die("");
		}
		
		if($status=="mail")
			$this->send_mail("poi5305@gmail.com", $title, $text);
		
		return true;
	}
	
	
	
	//Send Email
	function send_mail($to_mail, $subject="Empty", $massage="Empty")
	{
		//$cc_mail = "spviewer@muggle.tw";
		$cc_mail = "poi5305@gmail.com";
		
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['charset'] = 'utf-8';
		$config['smtp_host'] = "mx.muggle.tw";
		$config['smtp_port'] = 25;
		$config['smtp_user'] = "spviewer@muggle.tw";
		$config['smtp_pass'] = "qsefthu";
		$config['smtp_timeout'] = 10;
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);
		
		$this->email->from("spviewer@muggle.tw", "spviewer");
		$this->email->to($to_mail);
		$this->email->cc($cc_mail); 
		
		$this->email->subject($subject);
		$this->email->message($massage); 
		
		$this->email->send();
		
		$this->utility->log("msg", __CLASS__.".".__FUNCTION__, "Mail", "SendMail", "To: $to_mail, Title: $subject");
	}
	
	function message($msg = 0)
	{
		$value = "Success!";
		switch($msg)
		{
			case 1: $value = "更新成功"; break;
			case 2: $value = "兩次新密碼不同"; break;
			case 3: $value = "舊密碼錯誤"; break;
			case 4: $value = "密碼不可以為空，或少於8個字"; break;
		}
		return $value;
	}
	
	// For view handler
	function createHtmlView($data=array())
	{
		if(!isset($data['view_header'])) $data['view_header'] = array("view_header", '');
		if(!isset($data['view_banner'])) $data['view_banner'] = array("view_banner", '');
		if(!isset($data['view_info'])) $data['view_info'] = array("view_info", '');
		if(!isset($data['view_page'])) $data['view_page'] = array("view_page", '');	
				
		$this->load->view($this->config->item('template')."/view_index.php", $data);
	}
	
	
}






















?>
