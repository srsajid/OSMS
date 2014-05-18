/**
 * Created by User on 4/25/14.
 */
$(function(){
    App.tabs.tabs = $("#tabs");
    App.global_event.trigger("tab-created");
    App.tabs.tabs.tabs();
    $("button.ribbon-menu-btn").on("click", function(){
        var button = $(this);
        App.tabs.addToTab(button.attr("tab-id"))
    });

    App.tabs.tabs.delegate(".main-tab-header-container span.ui-icon-close", "click", function() {
        var panelId = $( this ).closest( "li" ).remove().attr( "aria-controls" );
        $( "#" + panelId ).remove();
        App.tabs.tabs.tabs( "refresh" );
    });
})