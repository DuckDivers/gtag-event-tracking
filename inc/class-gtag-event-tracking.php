<?php 
/*
* Admin Includes for Duck Gtag Tracking
*/

class DD_GTAG_Events {

    public function __construct(){
 //       add_action('admin_head', array($this , 'dd_add_mce_button') );
        add_action('admin_menu', array($this, 'dd_parallax_custom_admin_menu' ) );
        add_action('admin_menu', array($this,'register_dd_parallax_options') );
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
     }    

    public function enqueue_scripts() {
        wp_enqueue_script ('dd-gtag-scripts', plugin_dir_url(__FILE__) . 'event-tracking.js', array('jquery'), '1.0', true);
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

    // Admin Menu
    public function dd_parallax_custom_admin_menu() {
        add_options_page(
            'GTAG Event Tracking Options',
            'GTAG Event Options',
            'manage_options',
            'dd-gtag-options',
            array($this, 'dd_gtag_events_options_markup')
        );
    }

    function register_dd_parallax_options(){
            register_setting('dd_parallax_options_page', 'dd_gtag_event_mce_button'); 
        }


    // Admin Menu Markdown
    public function dd_gtag_events_options_markup(){ ?>

    <div class="wrap">
      <?php screen_icon(); ?>
      <form action="options.php" method="post" id="dd_gtag_event_mce_button" name="dd_parallax_options_form">
        <?php settings_fields('dd_parallax_options_page'); ?>
        <?php // Get Existing or Initialize Options
            if(get_option( 'dd_gtag_event_mce_button' )){
                $checked = 'checked';}
                else {$checked ='';};
            ?>
        <h2>Duck Diver GTAG Event Tracking Tiny MCE Button Options</h2>
        <table class="widefat">
          <thead>
            <tr>
              <th><strong>Options for the GTAG Event Tracking.</strong></th>
              <th> 
          </thead>
          <tbody>
            <tr>
              <td style="padding:15px 10px 5px; font-family:Verdana, Geneva, sans-serif;color:#666;"><label for="dd_gtag_event_mce_button">
                <p>
                  <input id="current" type="checkbox" name="dd_gtag_event_mce_button" value="1" <?php echo $checked;?>>
                  If this box is checked, the "GTAG Events" button <i class="dashicons-before dashicons-chart-area"></i> will be added to the WordPress Editor (TinyMCE).</p>
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
     <!-- <table class="widefat" style="margin-top: 30px;"	>
        <thead><tr></tr><th><h3>Example Shortcode Usage</h3></th></tr></thead>
        <tbody>
            <tr>
                <td>
                  <table width="500" bgcolor="#ddd" style="margin-left: 40px; margin-bottom: 30px;">
                    <tr><td><pre>[dd-parallax img="imagename.jpg" height="600" speed="3" z-index="-100" mobile="mobile-image.jpg"] <br />     Text to be overlaid on the paralllax window    <br />[/dd-parallax]</pre></td></tr></table>
                  <p><strong>Available parameters for use:</strong></p>
                  <ul class="duck-list">
                    <li>img - use the filename from the media library for this, not the full path. Just use imagename.jpg or image.png.</li>
                    <li>height - This is the height of the parallax window. The unit is in pixels. Just enter a number</li>
                    <li>speed [optional] (default = 2) An integer between 0 and 10. The speed at which the parallax effect runs. 0 means the image will appear fixed in place, and 10 the image will flow at the same speed as the page content.</li>
                    <li>z-index [optional] (defulat = 0) - The z-index value of the fixed-position elements. By default these will be behind everything else on the page.</li>
                    <li>mobile [optional] – If you want a mobile fixed image for mobile display, choose a different image, otherwise it will select the full sized image from the parallax and make it a responsive image.</li>
                   <li> position [optional] – (defaults to 'Left') This is analogous to the background-position-x css property. Specify coordinates as right, left, center, or pixel values (e.g. -10px 0px). The parallax image will be positioned as close to these values as possible while still covering the target element.</li>
                   <li>Offset [default = false] (options: "true" or "false") – This will pull the parallax content all the way to the left of your screen. You can put the contents into a "container" class if you're using bootstrap or just center the contents for horizontal centering. On testing with the WordPress 2016 Theme, keep offset at False. With Bootstrap Themes, I recommend using the "offset='true'" parameter.</li></ul>
                </td>
            </tr>
        </tbody>
      </table>-->
    </div>
    <?php }

}