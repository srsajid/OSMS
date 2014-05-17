/**
 * Created by User on 4/25/14.
 */
var _c = App.tabs.category =new TableTab("category", "Category", "category");
_c.beforeTabLoad = function(event, ui) {
    ui.ajaxSettings.data = {name: "aAJID"}
    console.log("befor")
}
_c.afterTabLoad = function(event, ui) {
    var panel = ui.panel;
    panel.find(".create-category").on("click", function(){
        util.editPopup("Create Category", "category/create");
    });
}