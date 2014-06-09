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
                var sellsTable = dom.find(".sells-item-table-container table");
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
                function addRow() {
                    var row = '<tr><td>#NAME#</td><td class="price">#PRICE#</td><td class="editable">#QUANTITY<#/td><td class="total">#TOTAL#</td><td><span class="glyphicon glyphicon-remove"></span></td></tr>'
                }
                function bindSelectionEvents(table) {
                    var pagination = table.find(".pagination");
                    var table = selectionTableContainer.find("table");
                    pagination.addClass("pagination-sm");
                    pagination.paginator();
                    pagination.on("paginator-click", function() {
                        loadSelectionTable(pagination.attr("offset"));
                    })

                    table.find("tr:gt(0)").on("click", function() {
                        var tr = $(this)
                        var data = tr.config("product");

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