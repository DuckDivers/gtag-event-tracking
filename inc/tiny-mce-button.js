//JavaScript Document
(function() {
	tinymce.PluginManager.add('dd_mce_button', function( editor, url ) {
		editor.addButton( 'dd_mce_button', {
			icon: 'graph',
			tooltip: 'Insert Trackable Event Link',
			  onclick: function() {
				  editor.windowManager.open( {
					  title: 'Insert Trackable Event Link',
                      width: 450,
                      height: 380,
                      buttons: [
                          {
                          text: 'Add Link',
                          onclick: 'submit'
                          },
                          {
                            text: 'Cancel',
                            onclick: 'close'  
                          }
                            ],
					  body: [
						  {type: 'container', html:'<h3 class="duck-px">Link Attributes</h3><hr class="duck-px"/>'},
						  {
							  type: 'textbox',
							  name: 'link',
							  label: 'URL',
							  value: ''
						  },
						  {
							  type: 'textbox',
							  name: 'link_text',
							  label: 'Link Text',
							  value: ''
						  },	
                          {
							  type: 'checkbox',
							  name: 'target',
							  label: 'Open in New Window',
							  value: ''
						  },				
						  {
							  type:'container',
							  html:'<p class="help" id="event-attributes">Enter the Event Attributes</p>'
						  },
						  {
							  type: 'textbox',
							  name: 'action',
							  label: 'Event Action',
							  value: ''
						  },
		  
						  {
							  type: 'textbox',
							  name: 'category',
							  label: 'Event Category',
							  value: ''
						  },
						  {
							  type:'textbox',
							  name:'label',
							  label: 'Event Label',
							  value: ''
						  }
					  ],
					  
					  onsubmit: function( e ) {
                          if (e.data.action !== ''){
                             var action = ' data-action="'+e.data.action+'"';
                          }
                          if (e.data.category !== ''){
                             var category = ' data-category="'+e.data.category+'"';
                          }
                          if (e.data.label !== ''){
                              var label = ' data-label="'+e.data.label+'"';
                          }
                          if (e.data.target){
                              var target = ' target="_blank"';
                          }
						  var theButton = '<a href="'+e.data.link+'" data-event="true" ' + action + category + label + target + '>'+e.data.link_text+'</a>';
						  editor.insertContent( theButton );
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
			  }
				
		});
	});
})();