<?php
require_once 'log.php';
Class Auth
{
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';
	
	public function attempt($username, $password)
	{
		if($username == 'guest' && $password == $password)
		{
			
		}	
	}
	public function check()
	{
		return if($username)
	}
	public function user()
	{

	}
	public function logout()
	{

	}
}