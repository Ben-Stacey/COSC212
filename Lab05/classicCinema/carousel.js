var MovieCategories = (function() {
    var pub = {};
    var imageList, imageIndex, classic, scifi, hitchcock;

    function nextImage() {
        if (imageIndex === 3) {
            imageIndex = 0;
        }
        document.getElementById("bloke").innerHTML = imageList[imageIndex].makeHTML();
        imageIndex += 1;
    }

    function MovieCategory(title, image, page) {
        this.title = title;
        this.image = image;
        this.page = page;
        this.makeHTML = function () {
            return "<a href=\"" + page + "\"><figure><img src=\"" + image + "\"/><figcaption>" + title + "</figcaption></figure></a>";
        }
    }

    pub.setup = function() {
        imageList = [];
        imageList.push(classic = new MovieCategory("classic", "images/Gone_With_the_Wind.jpg", "classic.html"));
        imageList.push(scifi = new MovieCategory("scifi", "images/The_Jazz_Singer.jpg", "scifi.html"));
        imageList.push(hitchcock = new MovieCategory("hitchcock", "images/Metropolis.jpg", "hitchcock.html"));
        imageIndex = 0;
        nextImage();
        setInterval(nextImage, 2000);
    }

    return pub;
}());

if (window.addEventListener) {
    window.addEventListener('load', MovieCategories.setup);
} else if (window.attachEvent) {
    window.attachEvent('onload', MovieCategories.setup);
} else {
    alert("Could not attach 'MovieCategories.setup' to the 'window.onload' event");
}