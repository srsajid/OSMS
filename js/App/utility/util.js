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
    twoSideSelection: function(container, leftTableUrl, fieldName){
        var leftTable, rightTable, leftTablePaginator;
        var globalFunc = {
            afterSelect: function(){}

        }
        function init() {
            leftTable = container.find(".first-column.column table");
            rightTable = container.find(".last-column.column table");
            leftTablePaginator = container.find(".first-column .pagination");
            leftTablePaginator.paginator();

        }
        function initLeftTable() {

        }
        function selectItem(item) {
            var name = item.parents("tr:eq(0)").find("td.name").text();
            var value = item.attr("value");
            var template = '<tr><td class="name">'+ name + '</td>' +
                '<td class="action"><span class="glyphicon glyphicon-remove"></span>' +
                '<input type="hidden" name="'+ fieldName +'" value="'+ value + '"></td></tr>';
            template = $(template)
            rightTable.append(template);
            globalFunc.afterSelect(template);
            rightTableRowEvents(template);
        }
        function deselectItem(item) {
            var checkBox = leftTable.find("input[value="+ item +"].selector");
            if(checkBox[0].checked) {
                checkBox[0].checked = false;
            }
            var selectedRow = rightTable.find("input[name="+ fieldName +"][value="+ item +"]").parents("tr:eq(0)");
            selectedRow.remove();
        }
        function bindLeftTableEvents() {
            leftTable.find("input[type=checkbox].selector").on('change', function() {
                var checked = this.checked;
                var $this = $(this);
                if(checked) {
                    selectItem($this)
                } else {
                    deselectItem($this.attr("value"));
                }
            })
        }
        function rightTableRowEvents(row) {
            row.find(".glyphicon-remove").on("click", function() {
                deselectItem(row.find("input[name="+fieldName+"]").val());
            })
        }
        function bindRightTableEvents() {
            rightTable.find("tr:gt(0)").each(function() {
                rightTableRowEvents($(this))
            })
        }
        container.loader();
        init();
        initLeftTable();
        bindLeftTableEvents();
        container.loader(false)
    },
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