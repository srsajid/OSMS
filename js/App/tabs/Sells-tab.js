/**
 * Created by User on 4/25/14.
 */
var _c = App.tabs.category =new TableTab("sells", "Sells", "sells/loadTable");
_c.beforeTableLoad = function(event, ui) {
    ui.ajaxSettings.data = {name: "rashad"}
    console.log("befor")
}
_c.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-category").on("click", function(){
        util.editPopup("Select Items", "sells", {
            success: function() {
                _self.reload();
            }
        });
    });
}