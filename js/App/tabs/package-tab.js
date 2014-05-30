/**
 * Created by User on 4/25/14.
 */
var _pp = App.tabs.package = new TableTab("package", "Package Product", App.baseUrl + "package/loadTable");

_pp.beforeTableLoad = function(event, ui) {
}

_pp.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-package").on("click", function() {
        _self.create();
    })
}

_pp.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "edit":
        case "inventory-update":
    }
}

_pp.create = function() {
    util.editPopup("Create Package Product", "test", {
        width: 800,
        after_load: function () {
            util.twoSideSelection(this, App.baseUrl + "product/selection", "items");
        }
    });
}