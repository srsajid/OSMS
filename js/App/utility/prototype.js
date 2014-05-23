/**
 * Created by User on 5/23/14.
 */
(function($){

    $.fn.loader = function(show) {
        var tag = this;
        if(show === false) {
            tag.find(".div-mask").detach();
        } else {
            var maskHtml = '<div><span class="vertical-aligner"></span><span class="loader"></span></div>';
            maskHtml = $(maskHtml);
            var position = tag.position();
            var positionType = tag.css("position");
            maskHtml.css({
                position: "absolute",
                left: positionType == "static" ? position.left : 0,
                top: positionType == "static" ? position.top : 0,
                width: maskHtml.width(tag.outerWidth()),
                height: maskHtml.height(tag.outerHeight())
            }).addClass("div-mask");
            tag.append(maskHtml);
        }
    }

    $.fn.paginator = function() {

    }

}(jQuery))