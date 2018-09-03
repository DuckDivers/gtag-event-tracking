<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php _e( 'Select your Animation Style', 'dd-gtag-event' ); ?>:</title>
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet"
	href="<?php echo plugin_dir_url(__FILE__).'admin.css'; ?>" />
<link rel="stylesheet" href="<?php echo trailingslashit(get_site_url()) . 'wp-includes/css/editor.min.css';?>" />
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>    
</head>
<body dir="ltr">
	<div class="modal dd_gtag_wrapper">
		<div class="dd_gtag-body">
			<form name="dd_gtag_wrapper" id="GTAG">
                <div class="form-contents" id="link-selector">
                    <div id="link-options">
                        <p class="howto" id="dd-gtag-enter-url">Enter the destination URL</p>
                        <div>
                            <label><span>URL</span>
                            <input id="dd_gtag_url" name="dd_gtag_url" type="text" aria-describedby="dd-gtag-enter-url"></label>
                        </div>
                        <div class="dd-gtag-text-field">
                            <label><span>Link Text</span>
                            <input id="dd_gtag_text" type="text"></label>
                        </div>
                        <div class="link-target">
                            <label><span></span>
                            <input type="checkbox" id="dd-gtag-target"> Open link in a new tab</label>
                        </div>
                        <p class="howto" id="dd-gtag-enter-action">Enter the Event Action (required)</p>
                        <div>
                            <label><span>Action</span>
                            <input id="dd_gtag_action" type="text" aria-describedby="dd-gtag-enter-action" required></label>
                        </div>
                        <div>
                        <p class="howto" id="dd-gtag-enter-category">Enter the Event Category</p>
                            <label><span>Category</span>
                            <input id="dd_gtag_category" type="text" aria-describedby="dd-gtag-enter-category"></label>
                        </div>
                        <div>
                        <p class="howto" id="dd-gtag-enter-label">Enter the Event Label</p>
                            <label><span>Label</span>
                            <input id="dd_gtag_label" type="text" aria-describedby="dd-gtag-enter-label"></label>
                        </div>
                    </div>
                </div>
                <div class="dd_gtag-footer-right">
					<button type="button" class="dd_gtag-insert btn-insert"><?php _e( 'Insert Link', 'dd-gtag-event' ); ?></button>
				</div>
				<div class="dd_gtag-footer-wrapper">
					<div class="dd_gtag-footer">
						<div class="dd_gtag-footer-left">
							<?php _e( 'By', 'dd-gtag-event' ); ?> <a href="http://www.duckdiverllc.com" target="_blank">Duck Diver Marketing</a>
							| <a
								href="https://wordpress.org/support/view/plugin-reviews/dd-gtag-event"
								target="_blank"><?php _e( 'Review Plugin', 'dd-gtag-event' ); ?></a>
						</div>
						
					</div>
				</div>
			</form>
		</div>
	</div>
    <script type="text/javascript">
			var args = top.tinymce.activeEditor.windowManager.getParams();
			var parentEditor = args['editor'];
			var url = args['plugin_url'];						
			var jQuery = args['jquery'];
		</script>
    <script type="text/javascript">		
        $(document).ready(function(){
        var dd_gtag_url, dd_gtag_label, dd_gtag_text, dd_gtag_category, dd_gtag_action;
        $('input#dd_gtag_url').blur(function(){
                dd_gtag_url = $(this).val();
            });
        $('input#dd_gtag_text').blur(function(){
                dd_gtag_text = $(this).val();
            });
        $('input#dd_gtag_action').blur(function(){
                dd_gtag_action = $(this).val();
            });
        $('input#dd_gtag_category').blur(function(){
                dd_gtag_category = $(this).val();
            });
        $('input#dd_gtag_label').blur(function(){
                dd_gtag_label = $(this).val();
            });
        
        var dd_category = '';    
            
        if (dd_gtag_category){
            dd_category = 'data-category="'+dd_gtag_category+'"';
            }    
        if (dd_gtag_label){
            dd_category = 'data-label="'+dd_gtag_label+'"';
            }    
            
        $('.btn-insert').on( 'click', function( event ) {
                console.log('click');
                var editorContent = parentEditor.selection.getContent();							

                if( null == editorContent || "" == editorContent ) {							
                    editorContent = ' <p>Please add your content in this area.</p> ';														
                } 

                var output  =     ['<a href="'+dd_gtag_url+'" data-event="true" data-action="' + dd_gtag_action + ' ' +dd_gtag_label + ' ' + dd_category + '>' + dd_gtag_text + '</a>']. join('');

                parentEditor.execCommand('mceInsertContent', false, output);					

                parentEditor.windowManager.close();						

            } );

    
});

</script>

</body>
</html>
