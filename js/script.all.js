jQuery(document).ready(function() {
    
    
    jQuery("[data-target='#header-search-form']").on('click', function(e) {
            jQuery('#header-search-form').slideToggle('collapse');
            e.preventDefault();
    });
    
    
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
        autoplay: false,
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
        autoplay: false,
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
        autoplay: false,
        autoplayTimeout: 13000,
        responsive:{
            0:{
                items:1
            },
            600: {
                items:2
            },
            992: {
                items:2
            }
        }
    });
    
    
    jQuery('.owl-carousel.blog-related-carousel').owlCarousel({
        loop:false,
        margin:15,
        responsiveClass:true,
        nav:true,
        navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
        dots: false,
        responsive:{
            0:{
                items:1,
            },
            480: {
                items:2
            },
            1200:{
                items:3,
            }
        }
    });
    
    jQuery('.related-show-on-click').click(function(){
        jQuery('.islemag-cat-show-on-click').show();
        jQuery(this).hide()
    });
    
    
    
});