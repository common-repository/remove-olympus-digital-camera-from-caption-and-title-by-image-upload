<?php
/**
 * @package remove-olympus-from-metadata
 * @version 0.83
 */

 /**
  * Plugin Name
  *
  * @package     remove-olympus-from-metadata
  * @author      Severin Roth
  * @copyright   2019 Severin Roth
  * @license     GPL-2.0+
  *
  * @wordpress-plugin
	* Plugin Name: Remove 'OLYMPUS DIGITAL CAMERA' from caption and title by image upload
	* Plugin URI: https://wordpress.org/plugins/remove-olympus-from-metadata/
	* Description: Any photo taken on an Olympus camera is assigned an all-caps ‘OLYMPUS DIGITAL CAMERA’ label in the caption ant title field of the metadata. This can be annoying because it’s not immediately evident that this is happening, but whenever you upload/post it on wordpress that surfaces this data, you’ll suddenly find it attached to your photo as the title and caption. This plugin replaces 'OLYMPUS DIGITAL CAMERA' when uploading with the file name. Other metadata will be preserved. The title and caption tag will only be replaced if it contains 'OLYMPUS DIGITAL CAMERA'. Other titles or captions will not be changed.
	* Author: Severin Roth
	* Version: 0.832
	* Tested up to: 5.6
	* Author URI: https://profiles.wordpress.org/severinroth
	* Text Domain: rofm
	* Domain Path: /languages
	* License:     GPL-2.0+
	* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

		if ( ! defined( 'ABSPATH' ) ) {
			exit;
		}
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if(!is_plugin_active( 'remove-olympus-digital-camera-from-caption-and-title-by-image-upload/init.php' )) return;

		define('rofmPATH',    	plugin_dir_path(__FILE__));
		define('rofmURL',     	plugins_url('', __FILE__));
		include_once(rofmPATH . '/mainPHP.php');

		function rofm_menu() {
			add_options_page('remove_OLYMPUS', 'remove OLYMPUS', 'manage_options', 'rofm_admin.php', 'rofmAdminPageHTML');
		}
		if(is_admin()) {
			add_action('admin_menu', 'rofm_menu', 100);
		}

		function rofmAdminPageHTML(){
			require_once (rofmPATH . 'rofm_admin.php');
		}


		function rofm_plugin_loaded() {
			// _e() __e() _x() _ex() usw das mo-File Laden Language File Internationalisierung
			load_plugin_textdomain('rofm', false, basename(dirname(__FILE__)).'/languages/');
		}
		add_action('plugins_loaded', 'rofm_plugin_loaded');

?>
