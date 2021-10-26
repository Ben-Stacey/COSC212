/*global L, markerLocation, markerBounds*/
/**
 * @desc A closure that manages the map.
 * @requires JQuery
 * @author Nick Meek
 * @created July 2019
 * @updated July 2021
 */
var MyMap = (function () {
    "use strict";
    var pub = {};
    var map;
    var poi;


    pub.setup = function () {
        var walkingTracks = L.layerGroup();
        var parks = L.layerGroup();

        map = L.map("map").setView([-45.874129, 170.503622], 15);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            {
                maxZoom: 18,
                attribution: "Map data &copy; <a href=http://www.openstreetmap.org/copyright>" +
                    "OpenStreetMap contributors</a> CC-BY-SA"
            });

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
            {
                maxZoom: 18,
                attribution: "Map data & copy; " + "<a href= 'http://www.openstreetmap.org/copyright'>" + "OpenStreetMap contributors </a> CC-BY-SA"
            }).addTo(map);

        var overlayMaps = {
            "WalkingTracks": walkingTracks,
            "Parks":  parks
        };

        L.control.layers(null, overlayMaps).addTo(map);

        $.getJSON("./json/POI.geojson", function (data) {
            poi = data.features;
            $.each(poi, function(k, v){
                var temp = L.geoJSON();
                if(v.properties.type === "park"){
                    temp.addData(v).bindPopup(v.properties.name).addTo(parks);
                }else if(v.properties.type === "walkingTrack"){
                    temp.addData(v).bindPopup(v.properties.name).addTo(walkingTracks);
                }else {
                    L.marker([v.geometry.coordinates[1], v.geometry.coordinates[0]]).addTo(map).bindPopup(v.properties.name);
                }
            });

        });
        map.on('click', onMapClick);


    };



    function onMapClick(e) {
        alert('You clicked the map at ' + e.latlng);
    }

    return pub;
}());


$(document).ready(MyMap.setup);