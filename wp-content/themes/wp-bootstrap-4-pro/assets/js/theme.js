jQuery(document).ready(function($) {

    "use strict";

    // For changing body class on scroll
    $(window).on("scroll resize", function() {
        if ($(window).scrollTop() >= 250) {
            $("body.wb-bp-front-page.trans-header").addClass("body-scrolled");
        }
        else {
            return $("body.wb-bp-front-page.trans-header").removeClass("body-scrolled");
        }
    });


    $(".navbar-toggler").on('click',function(){
        $(".page-template .site-header .navbar").toggleClass('bg-white');
    });


});
