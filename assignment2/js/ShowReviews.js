/**
 * @desc A closure that displays the reviews
 * @requires JQuery
 * @author Nick Meek
 * @created July 2019
 * @updated July 2021
 */
var ShowReviews = (function () {
    "use strict";
    var pub = {};

    pub.setup = function () {
        var s="<dl>";
        $.getJSON("./json/reviews.json", function (data) {
            $.each(data, function (k, v) {
                s += "<dt>" + v.title + " - " + v.author + "</dt>" +
                    "<dd>" + v.reviewcontent + "</dd>";
            });
            s += "</dl>";
            $("#reviews").append(s);
        });
    };

    return pub;
}());

$(document).ready(ShowReviews.setup);