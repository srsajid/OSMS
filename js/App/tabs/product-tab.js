/**
 * Created by User on 4/25/14.
 */
var _one = App.tabs.product = new TableTab("product", "Product", "product");

_one.beforeTableLoad = function(event, ui) {
    ui.ajaxSettings.data = "?sajid=sssssssss";
}
_one.afterTableLoad = function(event, ui) {
    var panel = ui.panel;
    panel.find("button").on("click", function() {
        util.editPopup("Test Form", "Form.html");
    })
    console.log("after");

}
