/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Logo
	wp.customize( "islemag_logo", function( value ) {
  	value.bind( function( to ) {
			if( to != '' ) {
				$( '.islemag_logo' ).removeClass( 'islemag_only_customizer' );
				$( '.header-logo-wrap' ).addClass( 'islemag_only_customizer' );
			}
			else {
				$( '.islemag_logo' ).addClass( 'islemag_only_customizer' );
				$( '.header-logo-wrap' ).removeClass( 'islemag_only_customizer' );
			}
	  	$(".islemag_logo img").attr( "src", to );
  	} );
  } );

	// Banner link
	wp.customize( "islemag_banner_link", function( value ) {
		value.bind( function( to ) {
			$( '.islemag-banner a' ).attr( 'href', to );
		} );
	} );

	// Top Slider Category
	wp.customize( "islemag_header_slider_category", function( value ) {
		value.bind( function( to ) {
			jQuery.ajax({
				url: requestpost.ajaxurl,
				type: 'post',
				data: {
					action: 'request_post',
					section: 'islemag_topslider_category',
					category: to
				},
				beforeSend: function() {
					jQuery('.islemag-top-container').replaceWith( '<div class="islemag-top-container" id="loader">Loading New Posts...</div>' );
				},
				success: function( result ) {
					jQuery('.islemag-top-container').replaceWith(result);
					jQuery('.owl-carousel.islemag-top-carousel').owlCarousel({
						loop:true,
						margin:0,
						responsiveClass:true,
						nav:false,
						navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
						dots: true,
						autoplay: true,
						autoplayTimeout: 10000,
						lazyLoad: true,
						animateIn: true,
						responsive:{
							0:{ items:1 },
							600: { items:2 },
							992: { items:3 }
						}
					});
				}
			});
		} );
	} );

	// Top Slider Nb of posts
	wp.customize( "islemag_header_slider_max_posts", function( value ) {
		value.bind( function( to ) {
			jQuery.ajax({
				url: requestpost.ajaxurl,
				type: 'post',
				data: {
					action: 'request_post',
					section: 'islemag_topslider_category',
					nb_of_posts: to
				},
				beforeSend: function() {
					jQuery('.islemag-top-container').replaceWith( '<div class="islemag-top-container" id="loader">Loading New Posts...</div>' );
				},
				success: function( result ) {
					jQuery('.islemag-top-container').replaceWith(result);
					jQuery('.owl-carousel.islemag-top-carousel').owlCarousel({
						loop:true,
						margin:0,
						responsiveClass:true,
						nav:false,
						navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
						dots: true,
						autoplay: true,
						autoplayTimeout: 10000,
						lazyLoad: true,
						animateIn: true,
						responsive:{
							0:{ items:1 },
							600: { items:2 },
							992: { items:3 }
						}
					} );
				}
			} );
		} );
	} );

	// Section 1 Title
	wp.customize( 'islemag_section1_title', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '.islemag-section1 .title-border' ).removeClass( 'islemag_only_customizer' );
				$( '.islemag-section1 .title-border span' ).text( to );
			} else {
				$( '.islemag-section1 .title-border' ).addClass( 'islemag_only_customizer' );
			}
		} );
	} );


	// Section1 Category
	wp.customize( 'islemag_section1_category', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section1_category',
						category: to
					},
					beforeSend: function() {
						jQuery('.islemag-section1').find('.islemag-template1').replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section1').find('.islemag-template1').replaceWith(result);
						jQuery('.owl-carousel.islemag-template1-posts').owlCarousel({
							 loop:true,
							 margin:30,
							 responsiveClass:true,
							 nav:true,
							 navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
							 dots: false,
							 autoplay: true,
							 autoplayTimeout: 12000,
							 lazyLoad: true,
							 animateIn: true,
							 responsive:{
								 0:{ items:1 },
								 600: { items:2 },
								 992: { items:3 }
							 }
						});
					}
				});
		} );
	} );

	// Section 1 Nb of posts
	wp.customize( 'islemag_section1_max_posts', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section1_category',
						nb_of_posts: to
					},
					beforeSend: function() {
						jQuery('.islemag-section1').find('.islemag-template1').replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section1').find('.islemag-template1').replaceWith(result);
						jQuery('.owl-carousel.islemag-template1-posts').owlCarousel({
							 loop:true,
							 margin:30,
							 responsiveClass:true,
							 nav:true,
							 navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
							 dots: false,
							 autoplay: true,
							 autoplayTimeout: 12000,
							 lazyLoad: true,
							 animateIn: true,
							 responsive:{
								 0:{ items:1 },
								 600: { items:2 },
								 992: { items:3 }
							 }
						});
					}
				});
		} );
	} );

	// Section2 Title
	wp.customize( 'islemag_section2_title', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '.islemag-section2 .title-border' ).removeClass( 'islemag_only_customizer' );
				$( '.islemag-section2 .title-border span' ).text( to );
			} else {
				$( '.islemag-section2 .title-border' ).addClass( 'islemag_only_customizer' );
			}
		} );
	} );

	// Section2 Category
	wp.customize( 'islemag_section2_category', function( value ) {
		value.bind( function( to ) {
			jQuery.ajax({
				url: requestpost.ajaxurl,
				type: 'post',
				data: {
					action: 'request_post',
					section: 'islemag_section2_category',
					category: to
				},
				beforeSend: function() {
					jQuery('.islemag-section2').find( '.islemag-template2' ).replaceWith( '<div class="islemag-template2" id="loader">Loading New Posts...</div>' );
				},
				success: function( result ) {
					jQuery('.islemag-section2').find( '.islemag-template2' ).replaceWith(result);
				}
			});
		} );
	} );

	// Section 2 Nb of posts
	wp.customize( 'islemag_section2_max_posts', function( value ) {
		value.bind( function( to ) {
			jQuery.ajax({
				url: requestpost.ajaxurl,
				type: 'post',
				data: {
					action: 'request_post',
					section: 'islemag_section2_category',
					nb_of_posts: to
				},
				beforeSend: function() {
					jQuery('.islemag-section2').find( '.islemag-template2' ).replaceWith( '<div class="islemag-template2" id="loader">Loading New Posts...</div>' );
				},
				success: function( result ) {
					jQuery('.islemag-section2').find( '.islemag-template2' ).replaceWith(result);
				}
			});
		} );
	} );

	// Section3 Title
	wp.customize( 'islemag_section3_title', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '.islemag-section3 .title-border' ).removeClass( 'islemag_only_customizer' );
				$( '.islemag-section3 .title-border span' ).text( to );
			} else {
				$( '.islemag-section3 .title-border' ).addClass( 'islemag_only_customizer' );
			}
		} );
	} );


	// Section3 Category
	wp.customize( 'islemag_section3_category', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section3_category',
						category: to
					},
					beforeSend: function() {
						jQuery('.islemag-section3').find('.islemag-template1').replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section3').find('.islemag-template1').replaceWith(result);
						jQuery('.owl-carousel.islemag-template1-posts').owlCarousel({
							 loop:true,
							 margin:30,
							 responsiveClass:true,
							 nav:true,
							 navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
							 dots: false,
							 autoplay: true,
							 autoplayTimeout: 12000,
							 lazyLoad: true,
							 animateIn: true,
							 responsive:{
								 0:{ items:1 },
								 600: { items:2 },
								 992: { items:3 }
							 }
						});
					}
				});
		} );
	} );

	// Section 3 Nb of posts
	wp.customize( 'islemag_section3_max_posts', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section3_category',
						nb_of_posts: to
					},
					beforeSend: function() {
						jQuery('.islemag-section3').find('.islemag-template1').replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section3').find('.islemag-template1').replaceWith(result);
						jQuery('.owl-carousel.islemag-template1-posts').owlCarousel({
							 loop:true,
							 margin:30,
							 responsiveClass:true,
							 nav:true,
							 navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
							 dots: false,
							 autoplay: true,
							 autoplayTimeout: 12000,
							 lazyLoad: true,
							 animateIn: true,
							 responsive:{
								 0:{ items:1 },
								 600: { items:2 },
								 992: { items:3 }
							 }
						});
					}
				});
		} );
	} );

	// Section4 title
	wp.customize( 'islemag_section4_title', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '.islemag-section4 .title-border' ).removeClass( 'islemag_only_customizer' );
				$( '.islemag-section4 .title-border span' ).text( to );
			} else {
				$( '.islemag-section4 .title-border' ).addClass( 'islemag_only_customizer' );
			}
		} );
	} );
	
	// Section4 Category
	wp.customize( 'islemag_section4_category', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section4_category',
						category: to
					},
					beforeSend: function() {
						jQuery('.islemag-section4 .islemag-template3').replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section4 .islemag-template3').replaceWith(result);
						jQuery('.owl-carousel.islemag-template3-posts').owlCarousel({
							loop:false,
							margin:0,
							responsiveClass:true,
							nav:true,
							navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
							dots: false,
							autoplay: true,
							autoplayTimeout: 15000,
							items:1,
							lazyLoad: true,
						});
					}
				});
		} );
	} );

	// Section5 Category
	wp.customize( 'islemag_section5_category', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section5_category',
						category: to
					},
					beforeSend: function() {
						jQuery('.islemag-section5 .islemag-template4').replaceWith( '<div class="islemag-template4" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section5 .islemag-template4').replaceWith(result);
						jQuery('.owl-carousel.islemag-template4-posts').owlCarousel({
				      loop:true,
				      margin:30,
				      responsiveClass:true,
				      nav:true,
				      navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
				      dots: false,
				      autoplay: true,
				      autoplayTimeout: 17000,
				      lazyLoad: true,
				      responsive:{
				        0:{ items:1 },
				        600: { items:2 },
				        992: { items:2 }
				      }
				    });
					}
				});
		} );
	} );

} )( jQuery );
