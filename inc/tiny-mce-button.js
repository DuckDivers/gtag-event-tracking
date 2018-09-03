// JavaScript to add the TinyMCE Button and Call the php file via Ajax.
(function($, ajaxurl) {
	tinymce.PluginManager.add('dd_mce_button', function( editor, url ) {
		editor.addButton( 'dd_mce_button', {
			icon: 'graph',
			tooltip: 'Insert Trackable Event Link',
			  onclick: function() {
				  editor.windowManager.open( {
                    file  :  ajaxurl + '?action=dd_gtag_get_popup'  ,
                    title : 'Add a Trackable Link',
                    width: 500,
                    height: 600,
                    inline: 1
                },{
                    editor: editor,
                    plugin_url : url,
                    jquery: $
                });
			  },
            getInfo : function() {
			return {
				longname : "Duck Diver GTAG Event Tracking",
				author : 'Howard Ehrenberg',
				authorurl : 'https://www.duckdiverllc.com/',
				version : "1.0"
			};
		}
				
		});
	});
})(jQuery, ajaxurl);