let getCart = (function () {
    "use strict";
    let pub = {};

    function cart() {
        let cartData = JSON.parse(localStorage.getItem("cart"));
        $.ajax({
            type: "POST",
            url: 'processCartContents.php',
            cache: false,
            data: JSON.stringify(cartData),
            datatype: 'JSON',
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                $("#cart").append("<table><tr><th>Title</th><th>Price</th></th></tr>")
                for(const movie of cartData){
                    $("#cart").append("<tr><td>" + movie.title + "</td><td>" + movie.price + "</td>");
                }
                $("#cart").append("</table>");
                window.localStorage.clear();
            },
            error: function (data) {
                alert("error");
            }
        });
    }

    pub.setup = function() {
        cart();
    };

    return pub;

}());

$(document).ready(getCart.setup);
