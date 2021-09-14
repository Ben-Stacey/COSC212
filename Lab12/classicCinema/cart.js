let cart = (function() {
    let pub = {};
    let values = [];

    function addToCart() {
        var object = {
            title: $(this).parent().parent().children("h3")[0].innerHTML,
            price: $(this).parent().children(".price")[0].innerHTML
        };
        alert(object.title);
        alert(object.price);
        let getCart = window.localStorage.getItem("values");
        if (getCart !== null) {
            getCart = JSON.parse(getCart);
            getCart.push(object);
            window.localStorage.setItem("values", JSON.stringify(getCart));
        } else {
            window.localStorage.setItem("values", JSON.stringify([object]));
        }
    }

    pub.setup = function () {
        $(".buy").click(addToCart);
    };
    return pub;
}());

$(document).ready(cart.setup);

/**
    function cartDetails() {
        "use strict";
        let items = {};

        items.title = this.parentNode.parentNode.getElementsByTagName("h3")[0].innerText;
        items.price = this.parentNode.getElementsByClassName("price")[0].innerText;

        if(window.sessionStorage.getItem("values") == null){
            values.push(items);
        }else{
            values = JSON.parse(window.sessionStorage.getItem("values"));
            values.push(items);
        }
        window.sessionStorage.setItem("values", JSON.stringify(values));
    }

    pub.setup = function() {
        "use strict";
        let buy, j;
        buy = document.getElementsByClassName("buy");
        for(let i = 0; i < buy.length; i++) {
            buy[i].onclick = cartDetails;
        }
    };
    return pub;
}());

if (window.addEventListener) {
    window.addEventListener('load', cart.setup);
} else if (window.attachEvent) {
    window.attachEvent('onload', cart.setup);
} else {
    alert("Could not attach 'Cart.setup' to the 'window.onload' event");
}
 **/