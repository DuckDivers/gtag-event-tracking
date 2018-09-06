<?php 
/*
* Admin Includes for Duck Gtag Tracking
*/

class DD_GTAG_Events {
    
    protected $version;

    public function __construct(){
        if ( defined( 'DD_GTAG_VERSION' ) ) {
			$this->version = DD_GTAG_VERSION;
		} else {
			$this->version = '1.0.0';
		}
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
        add_action('admin_menu', array($this, 'register_settings'));
        add_action('admin_menu', array($this, 'admin_menu'));
     }    

    public function enqueue_scripts() {
        if (get_option('dd_gtag_analytics_type') === 'gtag'){
            wp_enqueue_script ('dd-gtag-scripts', plugin_dir_url(__FILE__) . 'event-tracking.min.js', array('jquery'), $this->version, true);
        }
        else {
            wp_enqueue_script ('dd-gtag-scripts', plugin_dir_url(__FILE__) . 'universal.min.js', array('jquery'), $this->version, true);
        }
    }

    public function admin_enqueue_scripts() {
        wp_enqueue_script ('dd-gtag-admin', plugin_dir_url(__FILE__) . 'admin-scripts.js', array('jquery'), $this->version, true);
        wp_enqueue_style ('dd-gtag-admin-style', plugin_dir_url(__FILE__) . 'admin.css', $this->version , 'all');
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
    // Admin Menu
    public function admin_menu() {
        add_options_page(
            'GTAG Event Tracking Options',
            'GTAG Event Options',
            'manage_options',
            'dd-gtag-options',
            array($this, 'dd_gtag_events_options_markup')
        );
    }
    public function register_settings(){
            $args = array (
                'default' => 'gtag'
            );
            register_setting('dd_gtag_options', 'dd_gtag_analytics_type', $args); 
        }
    
    function dd_gtag_events_options_markup(){ ?>
    
     <div class="wrap">
      
      <form action="options.php" method="post" id="dd_gtag_options" name="dd_gtag_analytics_type_form">
        <?php settings_fields('dd_gtag_options'); ?>
        <?php // Get Existing or Initialize Options
            $value = get_option('dd_gtag_analytics_type');
            ?>
        <h2>Duck Diver GTAG Event Tracking Analytics Options</h2>
        <table class="widefat">
          <thead>
            <tr>
              <th><strong>Options for Event Tracking.</strong></th>
              <th> 
          </thead>
          <tbody>
            <tr>
              <td style="padding:15px 10px 5px; font-family:Verdana, Geneva, sans-serif;color:#666;"><label for="dd_gtag_event_mce_button">
                <p>
                  <label for="option">Choose Your Analytics Type: </label><select id="option"  name="dd_gtag_analytics_type">
                    <option value="gtag" <?php selected($value, 'gtag');?> >Gtag.js</option>
                    <option value="universal" <?php selected($value, 'universal');?>>Universal Analytics</option>
                    </select>
                  
                    </p>
                </label></td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th><input type="submit" name="submit" value="Save Settings" class="button button-primary" onClick="return empty()"  /></th>
            </tr>
          </tfoot>
        </table>
      </form>
    </div>
    <?php }
        
    

}