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
	 * Add Css and Script
	 * @since	2.0
	 */
	function load_custom_wp_admin_style() {
		wp_enqueue_style( 'jquery-responsiveTabs', USERAGENTCONTENTSWITCHER_PLUGIN_URL.'/css/responsive-tabs.css' );
		wp_enqueue_style( 'jquery-responsiveTabs-style', USERAGENTCONTENTSWITCHER_PLUGIN_URL.'/css/style.css' );
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'jquery-responsiveTabs', USERAGENTCONTENTSWITCHER_PLUGIN_URL.'/js/jquery.responsiveTabs.min.js' );
	}

	/* ==================================================
	 * Add Script on footer
	 * @since	2.0
	 */
	function load_custom_wp_admin_style2() {
		echo $this->add_jscss();
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

		?>
		<div class="wrap">
			<h2>UserAgentContentSwitcher</h2>
			<div id="useragentcontentswitcher-tabs">
				<ul>
				<li><a href="#useragentcontentswitcher-tabs-1"><?php _e('How to use', 'useragentcontentswitcher'); ?></a></li>
				<li><a href="#useragentcontentswitcher-tabs-2"><?php _e('Settings'); ?></a></li>
				<!--
				<li><a href="#useragentcontentswitcher-tabs-3">FAQ</a></li>
				 -->
				</ul>
				<div id="useragentcontentswitcher-tabs-1">
					<div class="wrap">

					<form method="post" action="options.php">

						<?php settings_fields('useragentcontentswitcher-settings-group'); ?>

						<h2><?php _e('Device Settings', 'useragentcontentswitcher') ?></h2>

						<div style="padding:10px;border:#CCC 2px solid; margin:0 0 20px 0">
							<div style="display:block"><?php _e('Tablet', 'useragentcontentswitcher'); ?></div>
							<div style="display:block;padding:20px 0">
							<?php _e('Short Code Attribute', 'useragentcontentswitcher'); ?><code>ua='tb'</code>
							</div>
							<div><?php _e('User Agent[Regular expression is possible.]', 'useragentcontentswitcher'); ?></div>
							<div style="display:block">
							<textarea id="useragentcontentswitcher_useragent_tb" name="useragentcontentswitcher_useragent_tb" rows="4" style="width: 100%;"><?php echo get_option('useragentcontentswitcher_useragent_tb') ?></textarea>
							</div>
							<div style="clear:both"></div>
						</div>

						<div style="padding:10px; border:#CCC 2px solid">
							<div style="display:block"><?php _e('Smartphone', 'useragentcontentswitcher'); ?></div>
							<div style="display:block;padding:20px 0">
							<?php _e('Short Code Attribute', 'useragentcontentswitcher'); ?><code>ua='sp'</code>
							</div>
							<div><?php _e('User Agent[Regular expression is possible.]', 'useragentcontentswitcher'); ?></div>
							<div style="display:block">
							<textarea id="useragentcontentswitcher_useragent_sp" name="useragentcontentswitcher_useragent_sp" rows="4" style="width: 100%;"><?php echo get_option('useragentcontentswitcher_useragent_sp') ?></textarea>
							</div>
							<div style="clear:both"></div>
						</div>

						<div style="margin:20px 0; padding:10px; border:#CCC 2px solid">
							<div style="display:block"><?php _e('Featurephone', 'useragentcontentswitcher'); ?></div>
							<div style="display:block;padding:20px 0">
							<?php _e('Short Code Attribute', 'useragentcontentswitcher'); ?><code>ua='mb'</code>
							</div>
							<div><?php _e('User Agent[Regular expression is possible.]', 'useragentcontentswitcher'); ?></div>
							<div style="display:block">
							<textarea id="useragentcontentswitcher_useragent_mb" name="useragentcontentswitcher_useragent_mb" rows="4" style="width: 100%;"><?php echo get_option('useragentcontentswitcher_useragent_mb') ?></textarea>
							</div>
							<div style="clear:both"></div>
						</div>

						<div style="clear:both"></div>

						<p class="submit">
							<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
						</p>

					</form>

			  		</div>
		  		</div>

				<div id="useragentcontentswitcher-tabs-2">
					<div class="wrap">
						<h2><?php _e('How to use', 'useragentcontentswitcher'); ?></h2>
						<div style="padding:10px;"><?php _e('Please add new Page. Please write a short code in the text field of the Page. Please go in Text mode this task.', 'useragentcontentswitcher'); ?></div>
						<div style="padding:10px;">
						<div><code>[agentsw]</code></div>
						<div style="padding:10px;"><?php _e('Please code the HTML for the PC here.', 'useragentcontentswitcher'); ?></div>
						<div><code>[/agentsw]</code></div>
						</div>
						<div style="padding:10px;">
						<div><code>[agentsw ua='pc']</code></div>
						<div style="padding:10px;"><?php _e('Please code the HTML for the PC here.', 'useragentcontentswitcher'); ?></div>
						<div><code>[/agentsw]</code></div>
						</div>
						<div style="padding:10px;">
						<div><code>[agentsw ua='tb']</code></div>
						<div style="padding:10px;"><?php _e('Please code the HTML for the Tablet here.', 'useragentcontentswitcher'); ?></div>
						<div><code>[/agentsw]</code></div>
						</div>
						<div style="padding:10px;">
						<div><code>[agentsw ua='sp']</code></div>
						<div style="padding:10px;"><?php _e('Please code the HTML for the Smartphone here.', 'useragentcontentswitcher'); ?></div>
						<div><code>[/agentsw]</code></div>
						</div>
						<div style="padding:10px;">
						<div><code>[agentsw ua='mb']</code></div>
						<div style="padding:10px;"><?php _e('Please code the HTML for the Featurephone here.', 'useragentcontentswitcher'); ?></div>
						<div><code>[/agentsw]</code></div>
						</div>
					</div>
				</div>

				<!--
				<div id="useragentcontentswitcher-tabs-3">
					<div class="wrap">
					<h2>FAQ</h2>
					</div>
				</div>
				-->
			</div>
		</div>
		<?php
	}

	/* ==================================================
	 * Add js css
	 * @since	2.0
	 */
	function add_jscss(){

// JS
$useragentcontentswitcher_add_jscss = <<<USERAGENTCONTENTSWITCHER

<!-- BEGIN: UserAgent Content Switcher -->
<script type="text/javascript">
jQuery('#useragentcontentswitcher-tabs').responsiveTabs({
  startCollapsed: 'accordion'
});
</script>
<!-- END: UserAgent Content Switcher -->

USERAGENTCONTENTSWITCHER;

		return $useragentcontentswitcher_add_jscss;

	}

}

?>