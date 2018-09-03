<?php
/*
  	Plugin Name: Google Analytics Event Tracking
  	Plugin URI: https://www.duckdiverllc.com/gtag-event-tracking
  	Version: 0.1
  	Contributors: thehowarde
	Author: Howard Ehrenberg
	Author URI: https://www.howardehrenberg.com
	Donate link: https://www.duckdiverllc.com/gtag-event-tracking/
	Tags: Google Analytics, Event Tracking, Click Tracking, GTAG
	Requires at least: 4.5
	Tested up to: 4.9
	Stable tag: 1.0
	Requires PHP: 5.6
  	Description: Add event tracking to Links
	License:  GNU General Public License v3
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
    Text Domain: dd-gtag-event
 */

if ( ! defined( 'ABSPATH' ) )
exit; 
 
define( 'DD_GTAG_EVENTS', __FILE__ );
$plugin_url = WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__));

require_once "$plugin_url/inc/class-gtag-event-tracking.php";
require_once "$plugin_url/inc/class-gtag-tinymce.php";

new DD_GTAG_EVENTS();
new DD_GTAG_TinyMCE();

?>