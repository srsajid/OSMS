/**
 * Created by User on 4/25/14.
 */
var _one = App.tabs.product = new TableTab("product", "Product", "product/loadTable");

_one.beforeTableLoad = function(event, ui) {
    ui.ajaxSettings.data = "?sajid=sssssssss";
}
_one.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-product").on("click", function() {
        util.editPopup("Create Table", "product/create", {
            success: function() {
                _self.reload();
            }
        });
    })
}
