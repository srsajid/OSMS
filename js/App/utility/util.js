/**
 * Created by User on 4/26/14.
 */
if(!window.console || !window.console.log) {
    (window.console || (window.console = {})).log = function(message) {
        var logContainer = $(".log-container");
        if(!logContainer.length) {
            logContainer = $("<div class='log-container'></div>").appendTo(document.body);
        }
        logContainer.append($("<div class='log-entry'></div>").append("" + message));
    }
}
window.log = function() {
    Function.prototype.apply.call(console.log, console, arguments) //console.log is not a true function in ie
}

if(!console.dir) {
    console.dir = console.log
}
window.dir = function() {
    Function.prototype.apply.call(console.dir, console, arguments)
}

var util = {
    ajax: function(settings) {
        var defaults  = {
            dataType: 'html',
            type: "GET"
        };
        $.extend(defaults, settings);
        $.ajax(defaults);
    },

    editPopup: function(title, url, config) {
        var defaults = {
            modal: true,
            width: 600,
            height: "auto",
            show: {
                effect: "blind",
                duration: 600
            },
            hide: {
                effect: "explode",
                duration: 600
            }
        }
        $.extend(defaults, config)
        var dom = $('<div class="edit-popup-container"></div>');
        this.ajax({
            url: url,
            success: function(resp) {
                dom.append($(resp))
                dom.dialog($.extend({
                    create: function() {
                        if(typeof defaults.after_load == "function") {
                            defaults.after_load.call(dom);
                        }
                        events();
                    },
                    close: function() {
                        dom.dialog("destroy")
                    },
                    title: title
                }, defaults));
            },
            error: function() {
                //TODO:
            }
        })
        function events() {
            dom.find("form.create-edit-form").form({
                ajax: true,
                preSubmit: function(ajaxSettings) {
                    if(typeof defaults.preSubmit == "function") {
                        $.extend(ajaxSettings, {
                            success: function() {
                               dom.dialog("close");
                               // TODO Reender success message
                            },
                            error: function(){
                               // TODO error message
                            }
                        })
                        config.preSubmit.call(dom, ajaxSettings)
                    }
                }
            })
        }


    }
}