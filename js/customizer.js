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

	// Titles color
	wp.customize( 'islemag_title_color', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( { 'color' : to } );
			$( 'h2' ).css( { 'color' : to } );
			$( 'h3' ).css( { 'color' : to } );
			$( 'h4' ).css( { 'color' : to } );
			$( 'h5' ).css( { 'color' : to } );
			$( 'h6' ).css( { 'color' : to } );
			$( 'h1 a' ).css( { 'color' : to } );
			$( 'h2 a' ).css( { 'color' : to } );
			$( 'h3 a' ).css( { 'color' : to } );
			$( 'h4 a' ).css( { 'color' : to } );
			$( 'h5 a' ).css( { 'color' : to } );
			$( 'h6 a' ).css( { 'color' : to } );
			$( '.title-border span').css( { 'color' : to } );
		} );
	} );

	// Sidebar text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			$( '.islemag-content-right' ).css( { 'color': to } );
			$( '.islemag-content-right a' ).css( { 'color': to } );
			$( '.post .entry-content' ).css( { 'color': to } );
			$( '.post .entry-content p' ).css( { 'color': to } );
			$( '.post .entry-cats' ).css( { 'color': to } );
			$( '.post .entry-cats a' ).css( { 'color': to } );
			$( '.post .entry-comments' ).css( { 'color': to } );
			$( '.post .entry-separator' ).css( { 'color': to } );
			$( '.post .entry-footer a' ).css( { 'color': to } );
			$( '.post .entry-footer span' ).css( { 'color': to } );
			$( '.post .entry-footer .entry-cats' ).css( { 'color': to } );
			$( '.post .entry-footer .entry-cats a' ).css( { 'color': to } );
			$( '.author-content' ).css( { 'color': to } );

		} );
	} );

	// Top slider title color
	wp.customize( 'islemag_top_slider_post_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.islemag-top-container .entry-title a' ).css( { 'color' : to } );
		} );
	} );

	// Top slider text color
	wp.customize( 'islemag_top_slider_post_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.islemag-top-container .entry-overlay-meta .entry-overlay-date' ).css( { 'color' : to } );
			$( '.islemag-top-container .entry-overlay-meta .entry-separator' ).css( { 'color' : to } );
			$( '.islemag-top-container .entry-overlay-meta > a' ).css( { 'color' : to } );
		} );
	} );

	// Post title color
	wp.customize( 'islemag_sections_post_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.islemag-content-left .entry-title a' ).css( { 'color' : to } );
		} );
	} );

	// Post text color
	wp.customize( 'islemag_sections_post_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.islemag-content-left .entry-meta' ).css( { 'color' : to } );
			$( '.islemag-content-left .entry-meta .entry-separator' ).css( { 'color' : to } );
			$( '.islemag-content-left .entry-meta a' ).css( { 'color' : to } );
			$( '.islemag-content-left .islemag-template3 .entry-overlay p' ).css( { 'color' : to } );
			$( '.islemag-content-left .blog-related-carousel .entry-content p' ).css( { 'color' : to } );
			$( '.islemag-content-left .blog-related-carousel .entry-cats .entry-label' ).css( { 'color' : to } );
			$( '.islemag-content-left .blog-related-carousel .entry-cats a' ).css( { 'color' : to } );
			$( '.islemag-content-left .blog-related-carousel > a' ).css( { 'color' : to } );
			$( '.islemag-content-left .blog-related-carousel .entry-footer > a' ).css( { 'color' : to } );
		} );
	} );





	// Repeater
	wp.customize( "islemag_social_icons", function( value ) {
		value.bind( function( to ) {
			var obj = JSON.parse( to );
			var result ="";
			var length = obj.length;
			obj.forEach(function(item) {

					result+=  '<a href="' + item.link + '" class="social-icon"><i class="fa ' + item.icon_value + '"></i></a>';

			});

			$( '.social-icons' ).html( result );

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
						jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith(result);
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

	// Section 4 number of posts
	wp.customize( 'islemag_section4_max_posts', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section4_category',
						nb_of_posts: to
					},
					beforeSend: function() {
						jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith(result);
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

	// Section 4 posts per page
	wp.customize( 'islemag_section4_posts_per_page', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section4_category',
						posts_per_page: to
					},
					beforeSend: function() {
						jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith(result);
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

	// Section 5 title
	wp.customize( 'islemag_section5_title', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( '.islemag-section5 .title-border' ).removeClass( 'islemag_only_customizer' );
				$( '.islemag-section5 .title-border span' ).text( to );
			} else {
				$( '.islemag-section5 .title-border' ).addClass( 'islemag_only_customizer' );
			}
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
						jQuery('.islemag-section5').find( '.islemag-template4').replaceWith( '<div class="islemag-template4" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section5').find( '.islemag-template4').replaceWith(result);
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

	// Section 5 number of posts
	wp.customize( 'islemag_section5_max_posts', function( value ) {
		value.bind( function( to ) {
				jQuery.ajax({
					url: requestpost.ajaxurl,
					type: 'post',
					data: {
						action: 'request_post',
						section: 'islemag_section5_category',
						nb_of_posts: to
					},
					beforeSend: function() {
						jQuery('.islemag-section5').find( '.islemag-template4').replaceWith( '<div class="islemag-template4" id="loader">Loading New Posts...</div>' );
					},
					success: function( result ) {
						jQuery('.islemag-section5').find( '.islemag-template4').replaceWith(result);
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

	wp.customize( 'islemag_single_page_hide_author', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '.about-author ' ).removeClass( 'islemag_hide' );
			} else {
				$( '.about-author ' ).addClass( 'islemag_hide' );
			}
		} );
	} );

	wp.customize( 'islemag_single_page_hide_related_posts', function( value ) {
		value.bind( function( to ) {
			if ( '1' != to ) {
				$( '.blog-related-carousel ' ).removeClass( 'islemag_hide' );
				$( '.blog-related-carousel-title ' ).removeClass( 'islemag_hide' );
			} else {
				$( '.blog-related-carousel ' ).addClass( 'islemag_hide' );
				$( '.blog-related-carousel-title ' ).addClass( 'islemag_hide' );
			}
		} );
	} );



} )( jQuery );
