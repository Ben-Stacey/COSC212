/**
 * @desc A closure that manages bookings.
 * @requires JQuery
 * @author Nick Meek
 * @created July 2019
 * @updated July 2021
 */
let Admin = (function () {
    "use strict";
    let pub = {};

    pub.setup = function () {
        let s = "<table border='1'><tr><th>Name</th><th>Dog</th><th>Pickup Date</th><th>Pickup Time</th><th>Booked Hours</th></tr>";
        let bookings = [];
        $.getJSON("./json/bookings.json", function (data) {
            bookings = data.bookings.booking;
            $.each(bookings, function (k, v) {
                s += "<tr><td>" + v.name +
                    "</td><td>" + v.dogId + "</td>" +
                    "</td><td>" + v.pickup.day + ":" + v.pickup.month + ":" + v.pickup.year +
                    "</td><td>" + v.pickup.time + "</td>" + "</td><td>" + v.numHours + "</td>";
            });
            s += "</table>";
            $("#bookings").append(s);
        });
    };

    return pub;
}());

$(document).ready(Admin.setup);
