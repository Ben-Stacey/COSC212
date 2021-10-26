let getCart = (function(){
    "use strict"
    let pub = {};

    function cart(){
        let cartData = JSON.parse(localStorage.getItem("cart"));
        $.ajax({
            type: "POST",
            url: 'ProcessCartContents.php',
            cache: false,
            data: JSON.stringify(cartData),
            datatype: 'JSON',
            contentType: "application,json; charset=utf-8",
            success: function(data) {
                $("#cart").append("<table><tr><th>Title</th><th>Price</th></tr>");
                for (const dog of cartData) {
                    $("#cart").append("<tr><td>" + dog.name + "</td><td>" + dog.price + "</td>");
                }
                $("#cart").append("</table>");
                window.localStorage.clear();
            },
            error: function(data){
                alert("error");
            }
        })
    }

    pub.setup = function(){
        cart();
    };
})
$(document).ready(getCart.setup);