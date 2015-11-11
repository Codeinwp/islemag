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
    
        /* index23.html - Popular Posts */
    jQuery('.owl-carousel.mpopular-posts').owlCarousel({
        loop:false,
        margin:30,
        responsiveClass:true,
        nav:true,
        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 10000,
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
    
    
    /* index23.html - Bigger Carousel */
    jQuery('.owl-carousel.mbigger-posts').owlCarousel({
        loop:false,
        margin:0,
        responsiveClass:true,
        nav:true,
        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 15000,
        items:1
    });
    
    
    /* index23.html - Most Rated Posts */
    jQuery('.owl-carousel.mmostrated-posts').owlCarousel({
        loop:false,
        margin:30,
        responsiveClass:true,
        nav:true,
        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
        dots: false,
        autoplay: true,
        autoplayTimeout: 13000,
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