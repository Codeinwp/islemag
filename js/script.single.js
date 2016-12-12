jQuery(document).ready(function() {

  /**
   * Related posts Slider
   **/
  jQuery('.owl-carousel.blog-related-carousel').owlCarousel({
      loop:true,
      margin:15,
      responsiveClass:true,
      nav:true,
      navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
      dots: false,
      lazyLoad: true,
      animateIn: true,
      responsive:{
        0: { items:1 },
        480: { items:2 },
        1200: { items:3 }
      }
  });

  /**
   * Show more categories for related posts
   **/
  jQuery('.related-show-on-click').click(function(){
      jQuery('.islemag-cat-show-on-click').show();
      jQuery(this).hide();
  });
});
