/* global screenReaderText */

jQuery(document).ready(function() {

	var islemag_sticky = jQuery('.islemag-sticky');

	if( typeof islemag_sticky !== 'undefined' ) {

		if( islemag_sticky.length ) {

			var islemag_sticky_offset = jQuery('.islemag-sticky').offset();

			if (typeof islemag_sticky_offset !== 'undefined') {

				var stickyNavTop = jQuery('.islemag-sticky').offset().top;

				var stickyNav = function () {
					var scrollTop = jQuery(window).scrollTop();
					var window_width = jQuery(window).outerWidth(true);

					if (scrollTop > stickyNavTop && window_width > 991) {
						jQuery('.islemag-sticky').addClass('sticky-menu');
					} else {
						jQuery('.islemag-sticky').removeClass('sticky-menu');
					}

				};

			}
		}

	}

	if( ! stickyMenu.disable_sticky ){
		stickyNav();
	}
	jQuery(window).scroll(function() {
		if( ! stickyMenu.disable_sticky ){
			stickyNav();
		}
	});
});

jQuery(window).on('resize', function(){

  //Search Box
  var top_navbar = jQuery('.navbar-top').height();
  if( top_navbar > 40 ){
    var searchbox_margin = ( top_navbar - 53 ) * -1;
    jQuery('#header-search-form').css('margin-top', searchbox_margin);
  } else {
    jQuery('#header-search-form').css('margin-top', '15px');
  }

});

jQuery(document).ready(function() {

  //Search box
  var top_navbar = jQuery('.navbar-top').height();
  if( top_navbar > 38 ){
    var searchbox_margin = ( top_navbar - 53 ) * -1;
    jQuery('#header-search-form').css('margin-top', searchbox_margin);
  } else {
    jQuery('#header-search-form').css('margin-top', searchbox_margin);
  }

  jQuery('.navbar-btn').click(function(){
    jQuery('#header-search-form').fadeToggle( 'fast', 'linear' );
  });

  /**
   * Provides helper functions to enhance the theme experience.
   */
   ( function( $ ) {
	    var body    = $( 'body' ), _window = $( window ),	nav, button, menu;

      button = $( '.menu-toggle' );
      menu = $( '.nav-menu' );

      function initMainNavigation( container ) {

        // Add dropdown toggle that display child menu items.
        container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );
        container.find( '.page_item_has_children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

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

  	/**
  	 * Enables menu toggle for small screens.
  	 */
	    ( function() {


    		button.on( 'click.islemag', function() {
          nav = $( this ).parent();
          menu = nav.find( '.nav-menu' );

    			nav.toggleClass( 'toggled-on' );
    			if ( nav.hasClass( 'toggled-on' ) ) {
    				$( this ).attr( 'aria-expanded', 'true' );
    				menu.attr( 'aria-expanded', 'true' );
    			} else {
    				$( this ).attr( 'aria-expanded', 'false' );
    				menu.attr( 'aria-expanded', 'false' );
    			}
    		} );

		    // Fix sub-menus for touch devices.
    		if ( 'ontouchstart' in window ) {
    			menu.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.islemag', function( e ) {
    				var el = $( this ).parent( 'li' );

    				if ( ! el.hasClass( 'focus' ) ) {
    					e.preventDefault();
    					el.toggleClass( 'focus' );
    					el.siblings( '.focus' ).removeClass( 'focus' );
    				}
    			} );
		    }

    		// Better focus for hidden submenu items for accessibility.
    		menu.find( 'a' ).on( 'focus.islemag blur.islemag', function() {
    			$( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
    		} );
	    } )();

    	/**
    	 * @summary Add or remove ARIA attributes.
    	 * Uses jQuery's width() function to determine the size of the window and add
    	 * the default ARIA attributes for the menu toggle if it's visible.
    	 * @since Twenty Thirteen 1.5
    	 */
    	function onResizeARIA() {
    		if ( 643 > _window.width() ) {
    			button.attr( 'aria-expanded', 'false' );
    			menu.attr( 'aria-expanded', 'false' );
    			button.attr( 'aria-controls', 'primary-menu' );
    		} else {
    			button.removeAttr( 'aria-expanded' );
    			menu.removeAttr( 'aria-expanded' );
    			button.removeAttr( 'aria-controls' );
    		}
    	}

    	_window
    		.on( 'load.islemag', onResizeARIA )
    		.on( 'resize.islemag', function() {
    			onResizeARIA();
    	} );

    	/**
    	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
    	 * accessibility.
    	 *
    	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
    	 */
      	_window.on( 'hashchange.islemag', function() {
      		var element = document.getElementById( location.hash.substring( 1 ) );

      		if ( element ) {
      			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
      				element.tabIndex = -1;
      			}

      			element.focus();
      		}
	      } );

        /**
         * Handles toggling the navigation menu for small screens and enables tab
         * support for dropdown menus.
         */
        ( function() {
        	var container, button, menu;

        	container = document.getElementById( 'site-navigation' );
        	if ( ! container ) {
        		return;
        	}

        	menu = container.getElementsByTagName( 'ul' )[0];

        	// Hide menu toggle button if menu is empty and return early.
        	if ( 'undefined' === typeof menu ) {
        		button.style.display = 'none';
        		return;
        	}

        	menu.setAttribute( 'aria-expanded', 'false' );
        	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
        		menu.className += ' nav-menu';
        	}

        } )();

  } )( jQuery );
});
