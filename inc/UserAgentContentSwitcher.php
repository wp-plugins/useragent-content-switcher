<?php

class UserAgentContentSwitcher {

	/* ==================================================
	* @param	none
	* @return	string	$mode
	* @since	1.0
	*/
	function agent_check(){

		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		if(preg_match("{".get_option('useragentcontentswitcher_useragent_tb')."}",$user_agent)){
			//Tablet
			$mode = "tb"; 
		}else if(preg_match("{".get_option('useragentcontentswitcher_useragent_sp')."}",$user_agent)){
			//Smartphone
			$mode = "sp";
		}else if(preg_match("{".get_option('useragentcontentswitcher_useragent_mb')."}",$user_agent)){
			//Japanese mobile phone
			$mode = "mb";
		}else{
			//PC or Tablet
			$mode = "pc"; 
		}

		return $mode;

	}

}

?>