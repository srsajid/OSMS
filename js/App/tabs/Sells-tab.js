/**
 * Created by User on 4/25/14.
 */
var _s = App.tabs.sells =new TableTab("sells", "Sells", "sells/loadTable");

_s.beforeTableLoad = function(event, ui) {

}

_s.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-sells").on("click", function(){
        var popup = util.editPopup("Select Items", App.baseUrl + "sells/create", {
            after_load: function() {
                var dom = this;
                var selectionTableContainer = dom.find(".selection-table-container");
                var sellsTableContainer = dom.find(".sells-item-table-container");
                function loadSelectionTable() {
                    util.ajax({
                        url: App.baseUrl + "sells/selection"
                    })
                }
            }
        });
    });
}