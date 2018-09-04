<?php
/**
 * @description: Class to handle TinyMCE related actions
 */

class DD_GTAG_TinyMCE {	
    
        public function __construct(){
           	add_action('init', array( $this, 'add_dd_gtag_button') );
//            add_action( 'wp_ajax_dd_gtag_get_popup', array( $this, 'get_popup' ) );
            add_action( 'init', array ($this, 'my_theme_add_editor_styles' ) );
        }
		
        // Declare script for new button
        public function add_tinymce_plugin( $plugin_array ) {
            $plugin_array['dd_mce_button'] =  plugins_url ('/tiny-mce-button.js', __FILE__);
            return $plugin_array;
        }
        
	
        // Register new button in the editor
        public function dd_register_mce_button( $buttons ) {
            array_push( $buttons, "|", 'dd_mce_button' );
            return $buttons;
        }
        
        
		function refresh_mce( $ver ) {
			
			$ver += 3;			
			return $ver;
		}
		
		function add_dd_gtag_button() {
			if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') )				
				return;
			
			if ( get_user_option('rich_editing') == 'true') {
				add_filter('mce_external_plugins', array( $this, 'add_tinymce_plugin'  ) );
				add_filter('mce_buttons', array( $this, 'dd_register_mce_button' ) );
			}
		}
		function my_theme_add_editor_styles() {
            add_editor_style( plugin_dir_url(__FILE__) . 'dd-editor-style.css' );
        }

}

	