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
    
    
    
//ACCESSIBILITY MENU
( function( $ ) {

    function initMainNavigation( container ) {
        // Add dropdown toggle that display child menu items.
        container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

		// Toggle buttons and submenu items with active children menu items.
		container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
		container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

		// Add menu items with submenus to aria-haspopup="true".
		container.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

		container.find( '.dropdown-toggle' ).click( function( e ) {
            var _this = $( this );
            e.preventDefault();
			_this.toggleClass( 'toggled-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		});
    }
    
    initMainNavigation( $( '.main-navigation' ) );
    
    masthead = $( '#masthead' );
	menuToggle       = masthead.find( '#menu-toggle' );
	siteHeaderMenu   = masthead.find( '#site-header-menu' );
	siteNavigation   = masthead.find( '#site-navigation' ); 
    
    
    
// Enable menuToggle.
( function() {
		// Return early if menuToggle is missing.
        if ( ! menuToggle ) {
			return;
		}

		// Add an initial values for the attribute.
		menuToggle.click(function() {
			$( this ).add( siteHeaderMenu ).toggleClass( 'toggled-on' );
		} );
	} )();


    // Fix sub-menus for touch devices and better focus for hidden submenu items for accessibility.
	( function() {
        if ( ! siteNavigation || ! siteNavigation.children().length ) {
			return;
		}

		if ( 'ontouchstart' in window ) {
			siteNavigation.find( '.menu-item-has-children > a' ).on( 'touchstart.islemag', function( e ) {
				var el = $( this ).parent( 'li' );
				if ( ! el.hasClass( 'focus' ) ) {
					e.preventDefault();
					el.toggleClass( 'focus' );
					el.siblings( '.focus' ).removeClass( 'focus' );
				}
			} );
		}

		siteNavigation.find( 'a' ).on( 'focus.islemag blur.islemag', function() {
			$( this ).parents( '.menu-item' ).toggleClass( 'focus' );
		} );
	} )();


	// Add he default ARIA attributes for the menu toggle and the navigations.
	function onResizeARIA() {
		if ( 910 > window.innerWidth ) {
			if ( menuToggle.hasClass( 'toggled-on' ) ) {
				menuToggle.attr( 'aria-expanded', 'true' );
			} else {
				menuToggle.attr( 'aria-expanded', 'false' );
			}

			if ( siteHeaderMenu.hasClass( 'toggled-on' ) ) {
				siteNavigation.attr( 'aria-expanded', 'true' );
			} else {
				siteNavigation.attr( 'aria-expanded', 'false' );
			}

			menuToggle.attr( 'aria-controls', 'site-navigation social-navigation' );
		} else {
			menuToggle.removeAttr( 'aria-expanded' );
			siteNavigation.removeAttr( 'aria-expanded' );
			menuToggle.removeAttr( 'aria-controls' );
		}
	}
    
    $( document ).ready( function() {
		$( window ).on( 'load.islemag', onResizeARIA )
	} );
    
    
} )( jQuery );
    
    
});