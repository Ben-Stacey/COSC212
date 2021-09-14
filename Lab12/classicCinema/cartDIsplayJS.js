var cartDisplayJS = (function(){
    var pub = {};
    pub.setup = function (){
        var cart = window.localStorage.getItem("values");

        if(cart !== null){
            cart = JSON.parse(cart);
            var subtotal = 0;
            for (let i = 0; i < cart.length; i++) {
                var price = parseFloat(cart[i].price);
                $("#item").append("<li>" + cart[i].title + +cart[i].price + "</li>");
                subtotal += price;
            }
            $("#total").html("Total price: " + subtotal);
        } else {
            $("#item").html("<li>" + "Your cart is empty" + "</li>");
        }
    };
    return pub;
}());

$(document).ready(cartDisplayJS.setup);
/**
let CartDetails = (function() {
    let pub = {};
    function cartDetails() {
        "use strict";
        let item, i, total = 0.0;
        let myCart = [];

        myCart = JSON.parse(window.sessionStorage.getItem("values"));
        item = document.getElementById("item");

        if(window.sessionStorage.getItem("values") == null){
            alert("Your cart is empty!");
            document.getElementById("checkoutForm").style.display = "none";
        }else{
            for(i = 0; i < myCart.length; i++){
                item.innerHTML += "<li>" + myCart[i].title + myCart[i].price + "</li>";
                total += parseFloat(myCart[i].price);
            }
            item.innerHTML += "<li>Total: $" + total.toFixed(2) + "</li>";
        }
    }

    pub.setup = function() {
        "use strict";
        cartDetails();
    };

    return pub;
}());

if (window.addEventListener) {
    window.addEventListener('load', CartDetails.setup);
} else if (window.attachEvent) {
    window.attachEvent('onload', CartDetails.setup);
} else {
    alert("Could not attach 'cart.setup' to the 'window.onload' event");
}

 **/