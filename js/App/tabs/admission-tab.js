/**
 * Created by User on 4/25/14.
 */
var _c = App.tabs.category =new TableTab("admission", "Admission", "admission");
_c.beforeTableLoad = function(event, ui) {
    ui.ajaxSettings.data = {name: "aAJID"}
    console.log("befor")
}
_c.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-admission").on("click", function(){
        util.editPopup("Create Student", "admission/admissionForm", {
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
    util.editPopup("Edit Student", "admission/edit", {
        success: function() {
            _self.reload();
        },
        data: {id: id}
    });
}