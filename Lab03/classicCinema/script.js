function showHideDetails() {
    "use strict";
    var paragraphs, p, image;
    /*jshint -W040*/
    paragraphs = this.parentNode.getElementsByTagName("p");
    /*jshint +W040*/
    for (p = 0; p < paragraphs.length; p+=1) {
        if (paragraphs[p].style.display === "none") {
            paragraphs[p].style.display = "block";
        } else {
            paragraphs[p].style.display = "none";
        }
    }
    /*jshint -W040*/
    image = this.parentNode.getElementsByTagName("img");
    /*jshint +W040*/
    for (p = 0; p < image.length; p+=1) {
        if (image[p].style.display === "none") {
            image[p].style.display = "block";
        } else {
            image[p].style.display = "none";
        }
    }
}

function setup() {
    "use strict";
    var films, f, title;

    films = document.getElementsByClassName("film");
    for (f = 0; f < films.length; f += 1) {
        title = films[f].getElementsByTagName("h3")[0];
        title.onclick = showHideDetails;
        title.style.cursor = "pointer";
    }
}

if (document.getElementById) {
    window.onload = setup;
}