/**
 * Created by User on 4/25/14.
 */
var _p = App.tabs.product = new TableTab("product", "Product", "product/loadTable");

_p.beforeTableLoad = function(event, ui) {
    ui.ajaxSettings.data = "?sajid=sssssssss";
}

_p.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-product").on("click", function() {
        _self.editProduct();
    })
}

_p.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "edit":
            _self.editProduct(data.id);
            break;
        case "update-inventory":
            _self.loadInventoryForm(data.id);
    }
}

_p.editProduct = function(id){
    var _self = this;
    util.editPopup("Create Table", "product/create", {
        success: function() {
            _self.reload();
        },
        data: {id: id}
    });
}

_p.loadInventoryForm = function(id) {

}