let showHideDetails = (function() {
    let pub = {};
    function showHideDetails() {
        "use strict";
        $(this).siblings().slideToggle();
    }

    pub.setup = function() {
        "use strict";
        $(".film").find("h3").css('cursor', 'pointer').click(showHideDetails);
    };
    return pub;
}());

$(document).ready(showHideDetails.setup);