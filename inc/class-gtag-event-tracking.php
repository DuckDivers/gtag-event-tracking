<?php 
/*
* Admin Includes for Duck Gtag Tracking
*/

class DD_GTAG_Events {

    public function __construct(){
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
     }    

    public function enqueue_scripts() {
        wp_enqueue_script ('dd-gtag-scripts', plugin_dir_url(__FILE__) . 'event-tracking.min.js', array('jquery'), '1.0', true);
    }

    public function admin_enqueue_scripts() {
        wp_enqueue_script ('dd-gtag-admin', plugin_dir_url(__FILE__) . 'admin-scripts.js', array('jquery'), '1.0', true);
        wp_enqueue_style ('dd-gtag-admin-style', plugin_dir_url(__FILE__) . 'admin.css', '1.0', 'all');
    }
    
    public function dd_add_mce_button() {
        // check user permissions
        if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
            return;
        }
        // check if WYSIWYG is enabled
        if ( 'true' == get_user_option( 'rich_editing' ) /*&& get_option( 'dd_parallax_mce_button')*/ ) {
            add_filter( 'mce_external_plugins', array($this, 'dd_add_tinymce_plugin' ) );
            add_filter( 'mce_buttons', array($this, 'dd_register_mce_button' ) );
        }
    }
}