// Google Tracking 
jQuery(document).ready(function($){
    $('a[data-event="true"]').click(function(){
        var action = $(this).data('action');
        var category = $(this).data('category');
        var label = $(this).data('label');
        gtag('event', action, { 'event_category' : category, 'event_label' : label });
    });
    
});