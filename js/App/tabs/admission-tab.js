/**
 * Created by User on 4/25/14.
 */
var _c = App.tabs.admission = new TableTab("admission", "admission", "admission");

_c.beforeTableLoad = function(event, ui) {
}
_c.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-admission").on("click", function(){
        util.editPopup("Create Student", "admission/create", {
            width:925,
            after_load: function() {
               var popup = this;
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('.' + $(input).attr("name")).attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
               popup.find("[type=file]").srFileInput();
               popup.find("[type=file]").on("change", function() {
                   readURL(this);
               })
            },
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