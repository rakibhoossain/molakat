// =====Owl Carousel Intialize======
(function($) {
    'use strict';
$(document).ready(function($) {

  $(".owl-carousel").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    dots: true,
    dotsEach: true,
    // dotsData: true,
    animateOut: 'fadeOut',
    });


});
}(jQuery));