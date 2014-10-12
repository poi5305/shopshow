<?php

include("facebook-php-sdk-v4-4.0-dev/autoload.php");
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('xxxxx','xxxxx');


class Facebook extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function get_login_url($redirect_url)
	{
		$helper = new FacebookRedirectLoginHelper(base_url($redirect_url));
		try
		{
			$login_url = $helper->getLoginUrl(array('scope' => 'public_profile,email'));
		} catch(FacebookRequestException $ex) {
			die("Error"); // When Facebook returns an error
		} catch(Exception $ex) {
			die("Error"); // When validation fails or other local issues
		}
		return $login_url;
	}
	function get_user_data($redirect_url)
	{
		$helper = new FacebookRedirectLoginHelper(base_url($redirect_url));
		try
		{
			$session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
			die("Error");
			//print_r($ex); // When Facebook returns an error
		} catch(Exception $ex) {
			die("Error"); // When validation fails or other local issues
		}
		if($session)
		{
			try
			{
				$user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
			} catch(FacebookRequestException $e) {
				die("Error");
				//echo "Exception occured, code: " . $e->getCode();
				//echo " with message: " . $e->getMessage();
			}
			$user['id'] = $user_profile->getId();
			$user['email'] = $user_profile->getProperty("email");
			return $user;
		}
		return false;
	}
	
	
}






















?>
