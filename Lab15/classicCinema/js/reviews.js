let Reviews = (function() {
    let pub = {};

    function parseReviews(data, target) {
        $(target).empty();
        if( $(data).find("review").length === 0){
            target.append("no reviews for this film.");
        }
        $(data).find("review").each(function () {
            let rating = $(this).find("rating")[0].textContent;
            let user = $(this).find("user")[0].textContent;
            target.append(user + ": " + rating + "\n");
        });
    }

    function showReviews() {
        let target = $(this).parent().find(".review")[0];
        let xmlSource = $(this).parent().find("img")[0].src;
        xmlSource = xmlSource.replace("images", "reviews").replace("jpg", "xml");
        $.ajax({
            type: "GET",
            url: xmlSource,
            cache: false,
            success: function (data) {
                parseReviews(data, target);
            },
            error: function(){
                target.append("No reviews for this film")
            }
        });
    }

    function displayReviewButtons(){
        $(".film").append('<input type="button" class="showReviews" value="Show Reviews">'+ '\n'+ '<div class="review"></div>');
    }

    pub.setup = function() {
        displayReviewButtons();
        $(".showReviews").click(showReviews);
    };

    return pub;
}());

$(document).ready(Reviews.setup);