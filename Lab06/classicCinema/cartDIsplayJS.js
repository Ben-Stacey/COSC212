let CartDetails = (function() {
    let pub = {};
    function cartDetails() {
        "use strict";
        let item, i, total = 0.0;
        let myCart = [];

        myCart = JSON.parse(Cookie.get("values"));
        item = document.getElementById("item");

        if(Cookie.get("values") == null){
            alert("Your cart is empty!");
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