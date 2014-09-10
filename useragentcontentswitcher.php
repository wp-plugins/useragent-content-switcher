<?php
/*
Plugin Name: UserAgent Content Switcher
Plugin URI: http://wordpress.org/plugins/useragent-content-switcher/
Version: 2.0
Description: Display the html written between the shortcode of each user agent.
Author: Katsushi Kawamori
Author URI: http://gallerylink.nyanko.org/
Domain Path: /languages
*/

/*  Copyright (c) 2014- Katsushi Kawamori (email : dodesyoswift312@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; version 2 of the License.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

	load_plugin_textdomain('useragentcontentswitcher', false, basename( dirname( __FILE__ ) ) . '/languages' );

	define("USERAGENTCONTENTSWITCHER_PLUGIN_BASE_FILE", plugin_basename(__FILE__));
	define("USERAGENTCONTENTSWITCHER_PLUGIN_BASE_DIR", dirname(__FILE__));
	define("USERAGENTCONTENTSWITCHER_PLUGIN_URL", plugins_url($path='',$scheme=null).'/useragent-content-switcher');

	require_once( USERAGENTCONTENTSWITCHER_PLUGIN_BASE_DIR . '/req/UserAgentContentSwitcherRegist.php' );
	$useragentcontentswitcherregist = new UserAgentContentSwitcherRegist();
	add_action('admin_init', array($useragentcontentswitcherregist, 'register_settings'));
	unset($useragentcontentswitcherregist);

	require_once( USERAGENTCONTENTSWITCHER_PLUGIN_BASE_DIR . '/req/UserAgentContentSwitcherAdmin.php' );
	$useragentcontentswitcheradmin = new UserAgentContentSwitcherAdmin();
	add_action( 'admin_menu', array($useragentcontentswitcheradmin, 'plugin_menu'));
	add_action( 'admin_enqueue_scripts', array($useragentcontentswitcheradmin, 'load_custom_wp_admin_style') );
	add_filter( 'plugin_action_links', array($useragentcontentswitcheradmin, 'settings_link'), 10, 2 );
	add_action( 'admin_footer', array($useragentcontentswitcheradmin, 'load_custom_wp_admin_style2') );
	unset($useragentcontentswitcheradmin);

	add_shortcode( 'agentsw', 'useragentcontentswitcher_func' );

/* ==================================================
 * Main
 */
function useragentcontentswitcher_func( $atts, $content = NULL ) {

	include_once dirname(__FILE__).'/inc/UserAgentContentSwitcher.php';
	$useragentcontentswitcher = new UserAgentContentSwitcher();
	$mode = $useragentcontentswitcher->agent_check();

	extract(shortcode_atts(array(
        'ua'  => ''
	), $atts));

	if ( $ua === 'pc' || empty($ua) ) {
		if ( $mode === 'pc') {
			return do_shortcode($content);
		} else {
			return "";
		}
	} else if ( $ua === 'tb' ) {
		if ( $mode === 'tb') {
			return do_shortcode($content);
		} else {
			return "";
		}
	} else if ( $ua === 'sp' ) {
		if ( $mode === 'sp') {
			return do_shortcode($content);
		} else {
			return "";
		}
	} else if ( $ua === 'mb' ) {
		if ( $mode === 'mb') {
			return do_shortcode($content);
		} else {
			return "";
		}
	}

}

?>