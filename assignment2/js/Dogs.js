let Dogs = (function() {
    "use strict";
    let pub;
    pub = {};

    /**
     * displays the information from the json file then adds a button
     * to allow you to book the dog
     *
     * @param data - data from the json file
     * @param target - place being written to
     */
    function parseDog(data, target) {
        "use strict";
        let dogs = "";
        let value = data.animals.dogs;

        for(let i = 0; i < value.length; i++) {
            let id = value[i].dogId;
            let name = value[i].dogName;
            let type = value[i].dogType;
            let desc = value[i].description;
            let size = value[i].dogSize;
            let price = value[i].pricePerHour;

            dogs += '<li class="name">Name: ' + name + '</li>';
            dogs += '<li>Breed: ' + type + '</li>';
            dogs += '<li>Description: ' + desc + '</li>';
            dogs += '<li class="price">Price: $' + price + '</li>';

            if (size === "Small") {
                dogs += '<li><img src="images/small.jpg" alt="picture"></li>';
            } else if (size === "Medium") {
                dogs += '<li><img src="images/medium.jpg" alt="picture"></li>';
            } else if (size === "Large") {
                dogs += '<li><img src="images/large.jpg" alt="picture"></li>';
            } else if (size === "Huge") {
                dogs += '<li><img src="images/huge.jpg" alt="picture"></li>';
            }
            dogs += '<li>' + "----------------------" + '</li>';
        }

        $(target).html(dogs);
    }

    /**
     * gets the information from the json file
     */
    function showDogs() {
        "use strict";
        let target = $("#dogs");

        $.ajax({
            type: "GET",
            url: "./json/animals.json",
            cache: false,
            success: function(data) {
                parseDog(data, target);
            },
            error: function(){
                alert("error");
            }
        });
    }

    pub.setup = function () {
        "use strict";
        showDogs();
    };

    return pub;
}());

$(document).ready(Dogs.setup);
