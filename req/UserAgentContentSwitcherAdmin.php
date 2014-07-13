<?php

class UserAgentContentSwitcherAdmin {

	/* ==================================================
	 * Add a "Settings" link to the plugins page
	 * @since	1.0
	 */
	function settings_link($links, $file) {
		static $this_plugin;
		if ( empty($this_plugin) ) {
			$this_plugin = USERAGENTCONTENTSWITCHER_PLUGIN_BASE_FILE;
		}
		if ( $file == $this_plugin ) {
			$links[] = '<a href="'.admin_url('options-general.php?page=UserAgentContentSwitcher').'">'.__( 'Settings').'</a>';
		}
		return $links;
	}

	/* ==================================================
	 * Settings page
	 * @since	1.0
	 */
	function plugin_menu() {
		add_options_page( 'UserAgentContentSwitcher Options', 'UserAgentContentSwitcher', 'manage_options', 'UserAgentContentSwitcher', array($this, 'plugin_options') );
	}

	/* ==================================================
	 * Settings page
	 * @since	1.0
	 */
	function plugin_options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		$pluginurl = plugins_url($path='',$scheme=null);

		wp_enqueue_style( 'jquery-ui-tabs', $pluginurl.'/useragent-content-switcher/css/jquery-ui.css' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script( 'jquery-ui-tabs-in', $pluginurl.'/useragent-content-switcher/js/jquery-ui-tabs-in.js' );
		?>
		<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div><h2>UserAgentContentSwitcher</h2>
			<div id="tabs">
				<ul>
				<li><a href="#tabs-1"><?php _e('How to use', 'useragentcontentswitcher'); ?></a></li>
				<li><a href="#tabs-2"><?php _e('Settings'); ?></a></li>
				<!--
				<li><a href="#tabs-3">FAQ</a></li>
				 -->
				</ul>
				<div id="tabs-1">
					<h2><?php _e('How to use', 'useragentcontentswitcher'); ?></h2>
					<p><b><?php _e('Please add new Page. Please write a short code in the text field of the Page. Please go in Text mode this task.', 'useragentcontentswitcher'); ?></b></p>
					<p>
					<div>&#91;agentsw&#93</div>
					<div><?php _e('Please code the HTML for the PC here.', 'useragentcontentswitcher'); ?></div>
					<div>&#91;/agentsw&#93</div>
					</p>
					<p>
					<div>&#91;agentsw ua='pc'&#93</div>
					<div><?php _e('Please code the HTML for the PC here.', 'useragentcontentswitcher'); ?></div>
					<div>&#91;/agentsw&#93</div>
					</p>
					<p>
					<div>&#91;agentsw ua='tb'&#93</div>
					<div><?php _e('Please code the HTML for the Tablet here.', 'useragentcontentswitcher'); ?></div>
					<div>&#91;/agentsw&#93</div>
					</p>
					<p>
					<div>&#91;agentsw ua='sp'&#93</div>
					<div><?php _e('Please code the HTML for the Smartphone here.', 'useragentcontentswitcher'); ?></div>
					<div>&#91;/agentsw&#93</div>
					</p>
					<p>
					<div>&#91;agentsw ua='mb'&#93</div>
					<div><?php _e('Please code the HTML for the Japanese mobile phone here.', 'useragentcontentswitcher'); ?></div>
					<div>&#91;/agentsw&#93</div>
					</p>
				</div>

				<div id="tabs-2">
					<div class="wrap">
					<form method="post" action="options.php">
						<?php settings_fields('useragentcontentswitcher-settings-group'); ?>

						<h2><?php _e('The default value for User Agent.', 'useragentcontentswitcher') ?></h2>	
						<table border="1" bgcolor="#dddddd">
						<tbody>
							<tr>
								<td align="center" valign="middle"><?php _e('Short Code Attribute', 'useragentcontentswitcher'); ?></td>
								<td align="center" valign="middle"><?php _e('Default'); ?></td>
								<td align="center" valign="middle" colspan="2"><?php _e('Description'); ?></td>
							</tr>
							<tr>
								<td align="center" valign="middle">ua='tb'</td>
								<td align="center" valign="middle">
									<textarea id="useragentcontentswitcher_useragent_tb" name="useragentcontentswitcher_useragent_tb" rows="4" cols="120"><?php echo get_option('useragentcontentswitcher_useragent_tb') ?></textarea>
								</td>
								<td align="center" valign="middle"><?php _e('for Tablet', 'useragentcontentswitcher'); ?></td>
								<td align="left" valign="middle" rowspan="3"><?php _e('| Specify separated by. Regular expression is possible.', 'useragentcontentswitcher'); ?></td>
							</tr>
							<tr>
								<td align="center" valign="middle">ua='sp'</td>
								<td align="center" valign="middle">
									<textarea id="useragentcontentswitcher_useragent_sp" name="useragentcontentswitcher_useragent_sp" rows="4" cols="120"><?php echo get_option('useragentcontentswitcher_useragent_sp') ?></textarea>
								</td>
								<td align="center" valign="middle"><?php _e('for Smartphone', 'useragentcontentswitcher'); ?></td>
							</tr>
							<tr>
								<td align="center" valign="middle">ua='mb'</td>
								<td align="center" valign="middle">
									<textarea id="useragentcontentswitcher_useragent_mb" name="useragentcontentswitcher_useragent_mb" rows="4" cols="120"><?php echo get_option('useragentcontentswitcher_useragent_mb') ?></textarea>
								</td>
								<td align="center" valign="middle"><?php _e('for Japanese mobile phone', 'useragentcontentswitcher'); ?></td>
							</tr>
						</tbody>
						</table>

						<p class="submit">
							<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
						</p>
					</form>
			  		</div>
		  		</div>
				<!--
				<div id="tabs-3">
					<div class="wrap">
					<h2>FAQ</h2>
					</div>
				</div>
				-->
			</div>
		</div>
		</div>
		<?php
	}

}

?>