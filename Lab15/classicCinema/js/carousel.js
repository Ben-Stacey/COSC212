let MovieCategories = (function() {
    let pub = {};
    let imageList, classic, scifi, hitchcock;
    let imageIndex;

    function nextImage() {
        let nextImage = imageList[imageIndex % 3];
        $("#carousel").html(nextImage.makeHTML());
        $("img").animate({height:"180px",opacity: 1},2000,"linear");
        $("img").animate({height:"1px",opacity: 0},2000,"linear");
        imageIndex++;
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
        console.log("1");
        imageList = [];
        imageList.push(classic = new MovieCategory("classic", "./images/Gone_With_the_Wind.jpg", "../php/classic.php"));
        imageList.push(scifi = new MovieCategory("scifi", "./images/The_Jazz_Singer.jpg", "../php/scifi.php"));
        imageList.push(hitchcock = new MovieCategory("hitchcock", "./images/Metropolis.jpg", "../php/hitchcock.php"));
        imageIndex = 0;
        nextImage();
        setInterval(nextImage, 2000);
    }
    return pub;
}());

if (document.getElementById) {
    window.onload = MovieCategories.setup;
}