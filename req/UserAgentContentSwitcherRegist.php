<?php

class UserAgentContentSwitcherRegist {

	/* ==================================================
	 * Settings register
	 * @since	1.0
	 */
	function register_settings(){
		register_setting( 'useragentcontentswitcher-settings-group', 'useragentcontentswitcher_useragent_tb');
		register_setting( 'useragentcontentswitcher-settings-group', 'useragentcontentswitcher_useragent_sp');
		register_setting( 'useragentcontentswitcher-settings-group', 'useragentcontentswitcher_useragent_mb');
		add_option('useragentcontentswitcher_useragent_tb','iPad|^.*Android.*Nexus(((?:(?!Mobile))|(?:(\s(7|10).+))).)*$|Kindle|Silk.*Accelerated|Sony.*Tablet|Xperia Tablet|Sony Tablet S|SAMSUNG.*Tablet|Galaxy.*Tab|SC-01C|SC-01D|SC-01E|SC-02D');
		add_option('useragentcontentswitcher_useragent_sp','iPhone|iPod|Android.*Mobile|BlackBerry|IEMobile');
		add_option('useragentcontentswitcher_useragent_mb','DoCoMo\/|KDDI-|UP\.Browser|SoftBank|Vodafone|J-PHONE|MOT-|WILLCOM|DDIPOCKET|PDXGW|emobile|ASTEL|L-mode');
	}

}

?>