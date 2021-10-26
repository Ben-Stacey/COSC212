let cartDisplayJS = (function(){
    let pub = {};
    pub.setup = function (){
        let cart = JSON.parse(window.localStorage.getItem("cart"));
        let cartList = $("#item");
        let totalCost = $("#total");
        let cost = 0.0;

        if(cart !== null){
            $("#checkoutForm").css("display", "block");
            for (const cartElement of cart) {
                cartList.append("<li>" + cartElement.title + " $" + cartElement.price + "</li>");
                cost += parseFloat(cartElement.price);
            }
            totalCost.html = "Total cost: $" + cost;
        }else{
            cartList.empty();
            cartList.append("<p>" + "Your cart is empty!" + "</p>");
            totalCost.empty();
            totalCost.append("Total cost: $0.00");
            $("#checkoutForm").css("display", "none");
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