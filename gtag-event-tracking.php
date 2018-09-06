<?php
/*
  	Plugin Name: Analytics Event Tracking for GTAG
  	Plugin URI: https://www.duckdiverllc.com/gtag-event-tracking
  	Version: 1.1
  	Contributors: thehowarde
	Author: Howard Ehrenberg
	Author URI: https://www.howardehrenberg.com
	Donate link: https://www.duckdiverllc.com/gtag-event-tracking/
	Tags: Google Analytics, Event Tracking, Click Tracking, GTAG
	Requires at least: 4.5
	Tested up to: 4.9
	Requires PHP: 5.6
  	Description: Add Google Analytics Event Tracking to any element, works with gtag or universal analytics when chosen on the settings page.
	License:  GNU General Public License v3
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
    Text Domain: dd-gtag-event
 */

if ( ! defined( 'ABSPATH' ) )
exit; 
 
define( 'DD_GTAG_EVENTS', __FILE__ );
define( 'DD_GTAG_VERSION', '1.1.0.');

$plugin_url = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__));

require_once "$plugin_url/inc/class-gtag-event-tracking.php";
require_once "$plugin_url/inc/class-gtag-tinymce.php";

new DD_GTAG_EVENTS();
new DD_GTAG_TinyMCE();

add_filter( 'plugin_row_meta', 'dd_gtag_events_plugin_row_meta', 10, 2 );

function dd_gtag_events_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'gtag-event-tracking.php' ) !== false ) {
		$new_links = array(
				'donate' => '<a href="https://www.duckdiverllc.com/" target="_blank">Donate</a>',
                'settings' => sprintf( '<a href="options-general.php?page=%s">%s</a>', 'dd-gtag-options', __('Settings') )
				);
		
		$links = array_merge( $links, $new_links );
	}
	
	return $links;
}

?>