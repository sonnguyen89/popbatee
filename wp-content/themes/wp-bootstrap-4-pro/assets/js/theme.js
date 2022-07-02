jQuery(document).ready(function(jQuery) {

    "use strict";

    // For changing body class on scroll
    jQuery(window).on("scroll resize", function() {
        if (jQuery(window).scrollTop() >= 250) {
            jQuery("body.wb-bp-front-page.trans-header").addClass("body-scrolled");
        }
        else {
            return jQuery("body.wb-bp-front-page.trans-header").removeClass("body-scrolled");
        }
    });


});
