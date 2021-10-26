let cart = (function() {
    let pub = {};

    function cartDetails() {
        "use strict";
        let movie = {
            title: $(this).parent().parent().children("h3")[0].innerHTML,
            price: $(this).parent().children(".price")[0].innerHTML
        };

        let values = window.localStorage.getItem("cart");

        if(values !== null){
            values = JSON.parse(values);
            values.push(movie);
            window.localStorage.setItem("cart", JSON.stringify((values)));
        }else {
            window.localStorage.setItem("cart", JSON.stringify([movie]));

        }
    }

    pub.setup = function() {
        "use strict";
        let buy = $(".buy");
        for(const buttons of buy) {
            $(buttons).click(cartDetails);
        }
    };
    return pub;
}());

$(document).ready(cart.setup);

