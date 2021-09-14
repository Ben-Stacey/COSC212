let Map = (function () {
    let pub = {};
    let north, mid, south, headings, markerLocation, markerBounds;

    function centreMap(e){
        if (this.textContent === 'Central') {
            markerLocation = [mid.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'North') {
            markerLocation = [north.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }else if (this.textContent === 'South') {
            markerLocation = [south.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }
    }

    function onMapClick(e) {
        alert('You clicked the map at ' + e.latlng);
    }

    pub.setup = function () {
        map = L.map('map').setView([-45.8743, 170.5035], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                maxZoom: 18,
                attribution: 'Map data &copy; ' +
                    '<a href="http://www.openstreetmap.org/copyright">' +
                    'OpenStreetMap contributors</a> CC-BY-SA'
            }).addTo(map);

        mid = L.marker([-45.8743, 170.5035]).addTo(map);
        mid.bindPopup("<div class='popup'><img src='images/Tarantula.jpg' alt='Tarantula'>" +
            "<b>Central Store</b><p>Specialising in Scifi Cinema</p></div>");

        north = L.marker([-45.8627, 170.5124]).addTo(map);
        north.bindPopup("<div class='popup'><img src='images/The_Birds.jpg' alt='The Birds'>" +
            "<b>North Store</b><p>Specialising in Hitchcock Cinema</p></div>");

        south = L.marker([-45.8827, 170.4978]).addTo(map);
        south.bindPopup("<div class='popup'><img src='images/Metropolis.jpg' alt='Metropolis'>" +
            "<b>South Store</b><p>Specialising in Classic Cinema</p></div>");

        headings = document.getElementsByTagName("h3");
        for (let i = 0; i < headings.length; i++){
            headings[i].onclick = centreMap;
            headings[i].style.cursor = "pointer";
        }

        map.on('click', onMapClick);
    };

    return pub;
}());

if (window.addEventListener) {
    window.addEventListener('load', Map.setup);
} else if (window.attachEvent) {
    window.attachEvent('onload', Map.setup);
} else {
    alert("Could not attach 'Map.setup' to the 'window.onload' event");
}