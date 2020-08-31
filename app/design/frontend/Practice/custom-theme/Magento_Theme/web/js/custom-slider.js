define([
    'jquery',
    'slick'
], function ($) {
    $(function () { // to ensure that code evaluates on page load
        $('.custom-slider').slick({
            dots: true,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 4500,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true,
            fade: true,
            cssEase: 'linear',
            arrows: true,
            swipe: true,
            pauseOnFocus: true,
            mobileFirst: true
        });

        $('.loading').remove();
    });
});
