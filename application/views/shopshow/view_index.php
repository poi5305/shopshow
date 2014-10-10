<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Saleable 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20131118

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShopShow</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/default.css" charset="utf-8" rel="stylesheet" type="text/css" />
<link href="css/fonts.css" charset="utf-8" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/default.css" media="screen, projection, tv ">

</head>
<body>
<?php
	$this->load->view($this->config->item('template') . "/$view_header[0]", $view_header[1]);

	$this->load->view($this->config->item('template') . "/$view_banner[0]", $view_banner[1]);

	$this->load->view($this->config->item('template') . "/$view_info[0]", $view_info[1]);

	$this->load->view($this->config->item('template') . "/$view_page[0]", $view_page[1]);
?>
<div id="copyright">
	<p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
