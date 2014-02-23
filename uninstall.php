<?php

	if( !defined('WP_UNINSTALL_PLUGIN') )
    	exit();

	delete_option('useragentcontentswitcher_useragent_tb');
	delete_option('useragentcontentswitcher_useragent_sp');
	delete_option('useragentcontentswitcher_useragent_mb');

?>