let cart = (function() {
    let pub = {};
    let values = [];

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