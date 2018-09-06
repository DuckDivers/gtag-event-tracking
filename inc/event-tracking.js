// Google Tracking 
jQuery(document).ready(function($){
    $('[data-event="true"]').click(function(){
        var action = $(this).data('action');
        var category = $(this).data('category');
        var label = $(this).data('label');
        gtag('event', action, { 'event_category' : category, 'event_label' : label });
    });
    
});

// Universal Analytics
jQuery(document).ready(function($) {
    $('[data-event="true"]').click(function(e) {
        e.preventDefault();
        var href = $(this).attr("href");
        var target = $(this).attr("target");
        var action = $(this).data('action');
        var category = $(this).data('category');
        var label = $(this).data('label');
        ga('send', 'event', category, action, label);
        setTimeout(function() {
            window.open(href, (!target ? "_self" : target))
        }, 100)
    })
})