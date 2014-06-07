/**
 * Created by User on 4/25/14.
 */
var _s = App.tabs.sells = new TableTab("sells", "Sells", "sells/loadTable");

_s.beforeTableLoad = function(event, ui) {

}

_s.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-sells").on("click", function(){
        var popup = util.editPopup("Create sells", App.baseUrl + "sells/create", {
            width: 700,
            after_load: function() {
                var dom = this;
                var selectionTableContainer = dom.find(".selection-table-container");
                var sellsTableContainer = dom.find(".sells-item-table-container");
                var packSelector = dom.find("select[name=packSelector]");
                var searchText = dom.find("input[name=searchText]");
                var searchArea = dom.find(".search-area")
                function loadSelectionTable(offset) {
                    util.ajax({
                        url: App.baseUrl + "sells/selection",
                        data: {package: packSelector.val(), searchText: searchText.val(), offset: offset},
                        success: function(resp) {
                            resp = $(resp)
                            selectionTableContainer.html(resp);
                            bindSelectionEvents(resp)
                        }
                    })
                }
                function bindSelectionEvents(table) {
                    var pagination = table.find(".pagination");
                    pagination.addClass("pagination-sm");
                    pagination.paginator();
                    pagination.on("paginator-click", function() {
                        loadSelectionTable(pagination.attr("offset"));
                    })
                }
                function bindEvents() {
                    packSelector.on("change", function() {
                        var value = $(this).val();
                        if(value) {
                            searchText.val("");
                            searchArea.hide();
                        } else {
                            searchArea.show();
                        }
                        loadSelectionTable();
                    })
                    dom.find("button.search").on("click", function() {
                        loadSelectionTable();
                    })
                }
                loadSelectionTable();
                bindEvents();
            }
        });
    });
}