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
        this.each(function() {
            var tag = $(this);
            tag.find("li").on("click", function() {
                var $this = $(this);
                if($this.is(".active,.disabled")) {
                    return;
                }
                var max =  parseInt(tag.attr("max"));
                var offset = parseInt(tag.attr("offset"));
                var total = parseInt(tag.attr("total"));
                var activePage = parseInt(tag.find(".active").attr("page"));
                var page = $this.attr("page")
                if(page == "next") {
                    page = activePage + 1;
                } else if (page == "prev") {
                    page = activePage - 1;
                } else {
                    page = parseInt(page)
                }
                tag.attr("offset", (page-1) * max);
                tag.trigger("paginator-click");
            })
        })

    }

}(jQuery))