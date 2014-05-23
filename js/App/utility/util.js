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
    onReady: function(obj, prop, callback, maxAttempt) {
        if(typeof maxAttempt == "undefined") {
            maxAttempt = 10
        }
        if(maxAttempt > 0) {
            if(typeof obj[prop] == "undefined") {
                if($.isPlainObject(callback) && callback.not) {
                    callback = $.extend({}, callback)
                    callback.not.call(obj);
                    callback.not = undefined
                }
                setTimeout(function() {
                    utility.onReady(obj, prop, callback, --maxAttempt)
                }, 2000)
            } else {
                ($.isPlainObject(callback) ? callback.ready : callback).call(obj[prop]);
            }
        } else {
            if($.isPlainObject(callback) && callback.fail) {
                callback.fail.call(obj);
            }
        }
    },
    editPopup: function(title, url, config) {
        var _self = this;
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
            },
            data: {}
        }
        defaults = $.extend(defaults, config)
        var dom = $('<div class="edit-popup-container"></div>');
        dom.loader();
        dom.dialog($.extend({
            create: function() {
            },
            close: function() {
                dom.dialog("destroy")
            },
            title: title
        }, defaults));
        this.ajax({
            url: url,
            data: defaults.data,
            success: function(resp) {
                dom.append($(resp))
                dom.loader(false);
                if(typeof defaults.after_load == "function") {
                    defaults.after_load.call(dom);
                }
                events();
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
                        defaults.preSubmit.call(dom, ajaxSettings)
                    }
                    $.extend(ajaxSettings, {
                        success: function(resp) {
                            if(resp.status != "success") {
                                this.error(null, null, resp);
                                return;
                            }
                            dom.dialog("close");
                            _self.notify(resp.message, "success");
                            if(typeof defaults.success == "function") {
                                defaults['success'](resp);
                            }
                        },
                        error: function(a, b, resp){
                            console.log("form error")
                            _self.notify(resp.message, "error");
                            if(typeof defaults.error == "function") {
                                defaults['error'](resp);
                            }
                        }
                    })
                }
            })
        }
    },
    notify: function(message, type) {
        alert(message);
    }
}