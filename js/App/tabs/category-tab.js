/**
 * Created by User on 4/25/14.
 */
var _c = App.tabs.category =new TableTab("category", "Category", "category");
_c.beforeTableLoad = function(event, ui) {
    ui.ajaxSettings.data = {name: "aAJID"}
    console.log("befor")
}
_c.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-category").on("click", function(){
        util.editPopup("Create Category", "category/create", {
            success: function() {
                _self.reload();
            }
        });
    });
}

_c.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "edit":
            _self.editCategory(data.id);
            break;
    }
}

_c.editCategory = function (id){
    var _self = this;
    util.editPopup("Edit Category", "category/edit", {
        success: function() {
            _self.reload();
        },
        data: {id: id}
    });
}