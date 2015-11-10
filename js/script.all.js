jQuery(document).ready(function() {
    jQuery('.owl-carousel.magazine-top-carousel').owlCarousel({
        loop:true,
        margin:0,
        responsiveClass:true,
        nav:false,
        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
        dots: true,
        autoplay: true,
        autoplayTimeout: 12000,
        responsive:{
            0:{
                items:1
            },
            600: {
                items:2
            },
            992: {
                items:3
            }
        }
    });
});