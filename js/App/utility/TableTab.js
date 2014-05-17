/**
 * Created by User on 5/9/14.
 */
var TableTab = function(id, title, url) {
    this.tabId = id;
    this.title = title;
    this.url = url;
}

var tableTabPrototype = TableTab.prototype;

tableTabPrototype.beforeTabLoad = function(event, ui) {
    var _self = this;
    if(typeof _self["beforeTableLoad"] == "function") {
        _self["beforeTableLoad"](event, ui);
    }
}

tableTabPrototype.afterTabLoad = function(ecvent, ui) {
    var _self = this;
    if(typeof _self["afterTableLoad"] == "function") {
        _self["afterTableLoad"](event, ui);
    }
}

tableTabPrototype.reload = function() {
    App.tabs.reload(this.tabId);
}