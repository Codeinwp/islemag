/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/* global requestpost */

function islemag_html_entity_decode(string, quote_style) {
	'use strict';
	var hash_map = {},
		symbol   = '',
		tmp_str  = '',
		entity   = '';
	tmp_str      = string.toString();

	if (false === (hash_map = islemag_get_html_translation_table( 'HTML_ENTITIES', quote_style ))) {
		return false;
	}

	delete( hash_map['&'] );
	hash_map['&'] = '&amp;';

	for (symbol in hash_map) {
		entity  = hash_map[symbol];
		tmp_str = tmp_str.split( entity )
			.join( symbol );
	}
	tmp_str = tmp_str.split( '&#039;' )
		.join( '\'' );

	return tmp_str;
}

function islemag_get_html_translation_table(table, quote_style) {
	'use strict';
	var entities               = {},
		hash_map               = {},
		decimal;
	var constMappingTable      = {},
		constMappingQuoteStyle = {};
	var useTable               = {},
		useQuoteStyle          = {};

	// Translate arguments
	constMappingTable[0]      = 'HTML_SPECIALCHARS';
	constMappingTable[1]      = 'HTML_ENTITIES';
	constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
	constMappingQuoteStyle[2] = 'ENT_COMPAT';
	constMappingQuoteStyle[3] = 'ENT_QUOTES';

	useTable      = ! isNaN( table ) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
	useQuoteStyle = ! isNaN( quote_style ) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() :
		'ENT_COMPAT';

	if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
		throw new Error( 'Table: ' + useTable + ' not supported' );
		// return false;
	}

	entities['38'] = '&amp;';
	if (useTable === 'HTML_ENTITIES') {
		entities['160'] = '&nbsp;';
		entities['161'] = '&iexcl;';
		entities['162'] = '&cent;';
		entities['163'] = '&pound;';
		entities['164'] = '&curren;';
		entities['165'] = '&yen;';
		entities['166'] = '&brvbar;';
		entities['167'] = '&sect;';
		entities['168'] = '&uml;';
		entities['169'] = '&copy;';
		entities['170'] = '&ordf;';
		entities['171'] = '&laquo;';
		entities['172'] = '&not;';
		entities['173'] = '&shy;';
		entities['174'] = '&reg;';
		entities['175'] = '&macr;';
		entities['176'] = '&deg;';
		entities['177'] = '&plusmn;';
		entities['178'] = '&sup2;';
		entities['179'] = '&sup3;';
		entities['180'] = '&acute;';
		entities['181'] = '&micro;';
		entities['182'] = '&para;';
		entities['183'] = '&middot;';
		entities['184'] = '&cedil;';
		entities['185'] = '&sup1;';
		entities['186'] = '&ordm;';
		entities['187'] = '&raquo;';
		entities['188'] = '&frac14;';
		entities['189'] = '&frac12;';
		entities['190'] = '&frac34;';
		entities['191'] = '&iquest;';
		entities['192'] = '&Agrave;';
		entities['193'] = '&Aacute;';
		entities['194'] = '&Acirc;';
		entities['195'] = '&Atilde;';
		entities['196'] = '&Auml;';
		entities['197'] = '&Aring;';
		entities['198'] = '&AElig;';
		entities['199'] = '&Ccedil;';
		entities['200'] = '&Egrave;';
		entities['201'] = '&Eacute;';
		entities['202'] = '&Ecirc;';
		entities['203'] = '&Euml;';
		entities['204'] = '&Igrave;';
		entities['205'] = '&Iacute;';
		entities['206'] = '&Icirc;';
		entities['207'] = '&Iuml;';
		entities['208'] = '&ETH;';
		entities['209'] = '&Ntilde;';
		entities['210'] = '&Ograve;';
		entities['211'] = '&Oacute;';
		entities['212'] = '&Ocirc;';
		entities['213'] = '&Otilde;';
		entities['214'] = '&Ouml;';
		entities['215'] = '&times;';
		entities['216'] = '&Oslash;';
		entities['217'] = '&Ugrave;';
		entities['218'] = '&Uacute;';
		entities['219'] = '&Ucirc;';
		entities['220'] = '&Uuml;';
		entities['221'] = '&Yacute;';
		entities['222'] = '&THORN;';
		entities['223'] = '&szlig;';
		entities['224'] = '&agrave;';
		entities['225'] = '&aacute;';
		entities['226'] = '&acirc;';
		entities['227'] = '&atilde;';
		entities['228'] = '&auml;';
		entities['229'] = '&aring;';
		entities['230'] = '&aelig;';
		entities['231'] = '&ccedil;';
		entities['232'] = '&egrave;';
		entities['233'] = '&eacute;';
		entities['234'] = '&ecirc;';
		entities['235'] = '&euml;';
		entities['236'] = '&igrave;';
		entities['237'] = '&iacute;';
		entities['238'] = '&icirc;';
		entities['239'] = '&iuml;';
		entities['240'] = '&eth;';
		entities['241'] = '&ntilde;';
		entities['242'] = '&ograve;';
		entities['243'] = '&oacute;';
		entities['244'] = '&ocirc;';
		entities['245'] = '&otilde;';
		entities['246'] = '&ouml;';
		entities['247'] = '&divide;';
		entities['248'] = '&oslash;';
		entities['249'] = '&ugrave;';
		entities['250'] = '&uacute;';
		entities['251'] = '&ucirc;';
		entities['252'] = '&uuml;';
		entities['253'] = '&yacute;';
		entities['254'] = '&thorn;';
		entities['255'] = '&yuml;';
	}

	if (useQuoteStyle !== 'ENT_NOQUOTES') {
		entities['34'] = '&quot;';
	}
	if (useQuoteStyle === 'ENT_QUOTES') {
		entities['39'] = '&#39;';
	}
	entities['60'] = '&lt;';
	entities['47'] = '&#x2F;';
	entities['62'] = '&gt;';

	// ascii decimals to real symbols
	for (decimal in entities) {
		if (entities.hasOwnProperty( decimal )) {
			hash_map[String.fromCharCode( decimal )] = entities[decimal];
		}
	}

	return hash_map;
}


function islemag_strip_tags(input, allowed) {
	'use strict';
	allowed                = (((allowed || '') + '')
		.toLowerCase()
		.match( /<[a-z][a-z0-9]*>/g ) || [])
		.join( '' ); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
	var tags               = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
		commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
	return input.replace( commentsAndPhpTags, '' )
		.replace(
			tags, function ($0, $1) {
				return allowed.indexOf( '<' + $1.toLowerCase() + '>' ) > -1 ? $0 : '';
			}
		);
}


(function ($) {
	// Site title and description.
	wp.customize(
		'blogname', function (value) {
			value.bind(
				function (to) {
					$( '.site-title a' ).text( to );
				}
			);
		}
	);
	wp.customize(
		'blogdescription', function (value) {
			value.bind(
				function (to) {
					$( '.site-description' ).text( to );
				}
			);
		}
	);

	// Titles color
	wp.customize(
		'islemag_title_color', function (value) {
			value.bind(
				function (to) {
					$( '.title-border span,	.post .entry-title, .post h1, .post h2, .post h3, .post h4, .post h5, .post h6, .post h1 a, .post h2 a, .post h3 a, .post h4 a, .post h5 a, .post h6 a, .page-header h1' ).css( {'color': to} );
				}
			);
		}
	);

	// Sidebar text color.
	wp.customize(
		'header_textcolor', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-content-right, .islemag-content-right a, .post .entry-content, .post .entry-content p, .post .entry-cats, .post .entry-cats a, .post .entry-comments,.post .entry-separator, .post .entry-footer a, .post .entry-footer span, .post .entry-footer .entry-cats, .post .entry-footer .entry-cats a, .author-content' ).css( {'color': to} );
				}
			);
		}
	);

	// Top slider title color
	wp.customize(
		'islemag_top_slider_post_title_color', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-top-container .entry-title a' ).css( {'color': to} );
				}
			);
		}
	);

	// Top slider text color
	wp.customize(
		'islemag_top_slider_post_text_color', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-top-container .entry-overlay-meta .entry-overlay-date, .islemag-top-container .entry-overlay-meta > a, .islemag-top-container .entry-overlay-meta .entry-separator' ).css( {'color': to} );
				}
			);
		}
	);

	// Post title color
	wp.customize(
		'islemag_sections_post_title_color', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-content-left .entry-title a' ).css( {'color': to} );
				}
			);
		}
	);

	// Post text color
	wp.customize(
		'islemag_sections_post_text_color', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-content-left .entry-meta .entry-separator, .islemag-content-left .entry-meta a, .islemag-content-left .islemag-template3 .entry-overlay p, .islemag-content-left .blog-related-carousel .entry-content p, .islemag-content-left .blog-related-carousel .entry-cats .entry-label, .islemag-content-left .blog-related-carousel .entry-cats a, .islemag-content-left .blog-related-carousel > a, .islemag-content-left .blog-related-carousel .entry-footer > a' ).css( {'color': to} );
				}
			);
		}
	);

	// Repeater
	wp.customize(
		'islemag_social_icons', function (value) {
			value.bind(
				function (to) {
					var obj    = JSON.parse( to );
					var result = '';
					obj.forEach(
						function (item) {

							result += '<a href="' + item.link + '" class="social-icon"><i class="fa ' + item.icon_value + '"></i></a>';

						}
					);

					$( '.social-icons' ).html( result );

				}
			);
		}
	);
	// Logo
	wp.customize(
		'custom_logo', function (value) {
			value.bind(
				function (to) {
					if (to !== '') {
						$( '.custom-logo-link' ).removeClass( 'islemag_only_customizer' );
						$( '.header-logo-wrap' ).addClass( 'islemag_only_customizer' );
					} else {
						$( '.custom-logo-link' ).addClass( 'islemag_only_customizer' );
						$( '.header-logo-wrap' ).removeClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	wp.customize(
		'islemag_banner', function (value) {
			value.bind(
				function (to) {
					var obj = JSON.parse( to );
					if (obj.position !== '') {
						$( '.islemag-banner' ).attr( 'style', 'text-align:' + obj.position );
					}
					if (obj.choice === 'code') {
						if (obj.code !== '') {
							$( '.islemag-banner' ).html( islemag_html_entity_decode( obj.code ) );
						}
					} else {
						if (obj.image_url !== '') {
							if (obj.link !== '') {
								$( '.islemag-banner' ).html( '<a href="' + obj.link + '"><img src="' + obj.image_url + '" alt="Banner link"></a>' );
							} else {
								$( '.islemag-banner' ).html( '<img src="' + obj.image_url + '" alt="Banner link">' );
							}
						}
					}

				}
			);
		}
	);

	// Top Slider Category
	wp.customize(
		'islemag_header_slider_category', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_topslider_category',
								category: to,
								nb_of_posts: wp.customize._value.islemag_header_slider_max_posts()
							},
							beforeSend: function () {
								jQuery( '.islemag-top-container' ).replaceWith( '<div class="islemag-top-container" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-top-container' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-top-carousel' ).owlCarousel(
									{
										loop: true,
										margin: 0,
										responsiveClass: true,
										nav: false,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: true,
										autoplay: true,
										autoplayTimeout: 10000,
										lazyLoad: true,
										animateIn: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 3}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Top Slider Nb of posts
	wp.customize(
		'islemag_header_slider_max_posts', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_topslider_category',
								category: wp.customize._value.islemag_header_slider_category(),
								nb_of_posts: to
							},
							beforeSend: function () {
								jQuery( '.islemag-top-container' ).replaceWith( '<div class="islemag-top-container" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-top-container' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-top-carousel' ).owlCarousel(
									{
										loop: true,
										margin: 0,
										responsiveClass: true,
										nav: false,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: true,
										autoplay: true,
										autoplayTimeout: 10000,
										lazyLoad: true,
										animateIn: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 3}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 1 Title
	wp.customize(
		'islemag_section1_title', function (value) {
			value.bind(
				function (to) {
					if (to !== '') {
						$( '.islemag-section1 .title-border' ).removeClass( 'islemag_only_customizer' );
						$( '.islemag-section1 .title-border span' ).text( to );
					} else {
						$( '.islemag-section1 .title-border' ).addClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	// Section1 Category
	wp.customize(
		'islemag_section1_category', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section1_category',
								category: to,
								nb_of_posts: wp.customize._value.islemag_section1_max_posts(),
							},
							beforeSend: function () {
								jQuery( '.islemag-section1' ).find( '.islemag-template1' ).replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section1' ).find( '.islemag-template1' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template1-posts' ).owlCarousel(
									{
										loop: true,
										margin: 30,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 12000,
										lazyLoad: true,
										animateIn: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 3}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 1 Nb of posts
	wp.customize(
		'islemag_section1_max_posts', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section1_category',
								nb_of_posts: to,
								category: wp.customize._value.islemag_section1_category()
							},
							beforeSend: function () {
								jQuery( '.islemag-section1' ).find( '.islemag-template1' ).replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section1' ).find( '.islemag-template1' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template1-posts' ).owlCarousel(
									{
										loop: true,
										margin: 30,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 12000,
										lazyLoad: true,
										animateIn: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 3}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section2 Title
	wp.customize(
		'islemag_section2_title', function (value) {
			value.bind(
				function (to) {
					if (to !== '') {
						$( '.islemag-section2 .title-border' ).removeClass( 'islemag_only_customizer' );
						$( '.islemag-section2 .title-border span' ).text( to );
					} else {
						$( '.islemag-section2 .title-border' ).addClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	// Section2 Category
	wp.customize(
		'islemag_section2_category', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section2_category',
								category: to,
								nb_of_posts: wp.customize._value.islemag_section2_max_posts()
							},
							beforeSend: function () {
								jQuery( '.islemag-section2' ).find( '.islemag-template2' ).replaceWith( '<div class="islemag-template2" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section2' ).find( '.islemag-template2' ).replaceWith( result );
							}
						}
					);
				}
			);
		}
	);

	// Section 2 Nb of posts
	wp.customize(
		'islemag_section2_max_posts', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section2_category',
								nb_of_posts: to,
								category: wp.customize._value.islemag_section2_category()
							},
							beforeSend: function () {
								jQuery( '.islemag-section2' ).find( '.islemag-template2' ).replaceWith( '<div class="islemag-template2" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section2' ).find( '.islemag-template2' ).replaceWith( result );
							}
						}
					);
				}
			);
		}
	);

	// Section3 Title
	wp.customize(
		'islemag_section3_title', function (value) {
			value.bind(
				function (to) {
					if (to !== '') {
						$( '.islemag-section3 .title-border' ).removeClass( 'islemag_only_customizer' );
						$( '.islemag-section3 .title-border span' ).text( to );
					} else {
						$( '.islemag-section3 .title-border' ).addClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	// Section3 Category
	wp.customize(
		'islemag_section3_category', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section3_category',
								category: to,
								nb_of_posts: wp.customize._value.islemag_section3_max_posts()
							},
							beforeSend: function () {
								jQuery( '.islemag-section3' ).find( '.islemag-template1' ).replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section3' ).find( '.islemag-template1' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template1-posts' ).owlCarousel(
									{
										loop: true,
										margin: 30,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 12000,
										lazyLoad: true,
										animateIn: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 3}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 3 Nb of posts
	wp.customize(
		'islemag_section3_max_posts', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section3_category',
								nb_of_posts: to,
								category: wp.customize._value.islemag_section3_category()
							},
							beforeSend: function () {
								jQuery( '.islemag-section3' ).find( '.islemag-template1' ).replaceWith( '<div class="islemag-template1" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section3' ).find( '.islemag-template1' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template1-posts' ).owlCarousel(
									{
										loop: true,
										margin: 30,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 12000,
										lazyLoad: true,
										animateIn: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 3}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section4 title
	wp.customize(
		'islemag_section4_title', function (value) {
			value.bind(
				function (to) {
					if (to !== '') {
						$( '.islemag-section4 .title-border' ).removeClass( 'islemag_only_customizer' );
						$( '.islemag-section4 .title-border span' ).text( to );
					} else {
						$( '.islemag-section4 .title-border' ).addClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	// Section4 Category
	wp.customize(
		'islemag_section4_category', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section4_category',
								category: to,
								nb_of_posts: wp.customize._value.islemag_section4_max_posts(),
								posts_per_page: wp.customize._value.islemag_section4_posts_per_page()

							},
							beforeSend: function () {
								jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template3-posts' ).owlCarousel(
									{
										loop: false,
										margin: 0,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 15000,
										items: 1,
										lazyLoad: true,
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 4 number of posts
	wp.customize(
		'islemag_section4_max_posts', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section4_category',
								nb_of_posts: to,
								posts_per_page: wp.customize._value.islemag_section4_posts_per_page(),
								category: wp.customize._value.islemag_section4_category()
							},
							beforeSend: function () {
								jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template3-posts' ).owlCarousel(
									{
										loop: false,
										margin: 0,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 15000,
										items: 1,
										lazyLoad: true,
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 4 posts per page
	wp.customize(
		'islemag_section4_posts_per_page', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section4_category',
								posts_per_page: to,
								category: wp.customize._value.islemag_section4_category(),
								nb_of_posts: wp.customize._value.islemag_section4_max_posts()
							},
							beforeSend: function () {
								jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( '<div class="islemag-template3" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section4' ).find( '.islemag-template3' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template3-posts' ).owlCarousel(
									{
										loop: false,
										margin: 0,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 15000,
										items: 1,
										lazyLoad: true,
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 5 title
	wp.customize(
		'islemag_section5_title', function (value) {
			value.bind(
				function (to) {
					if (to !== '') {
						$( '.islemag-section5 .title-border' ).removeClass( 'islemag_only_customizer' );
						$( '.islemag-section5 .title-border span' ).text( to );
					} else {
						$( '.islemag-section5 .title-border' ).addClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	// Section5 Category
	wp.customize(
		'islemag_section5_category', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section5_category',
								category: to,
								nb_of_posts: wp.customize._value.islemag_section5_max_posts()
							},
							beforeSend: function () {
								jQuery( '.islemag-section5' ).find( '.islemag-template4' ).replaceWith( '<div class="islemag-template4" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section5' ).find( '.islemag-template4' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template4-posts' ).owlCarousel(
									{
										loop: true,
										margin: 30,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 17000,
										lazyLoad: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 2}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	// Section 5 number of posts
	wp.customize(
		'islemag_section5_max_posts', function (value) {
			value.bind(
				function (to) {
					jQuery.ajax(
						{
							url: requestpost.ajaxurl,
							type: 'post',
							data: {
								action: 'request_post',
								section: 'islemag_section5_category',
								nb_of_posts: to,
								category: wp.customize._value.islemag_section5_category()
							},
							beforeSend: function () {
								jQuery( '.islemag-section5' ).find( '.islemag-template4' ).replaceWith( '<div class="islemag-template4" id="loader">Loading New Posts...</div>' );
							},
							success: function (result) {
								jQuery( '.islemag-section5' ).find( '.islemag-template4' ).replaceWith( result );
								jQuery( '.owl-carousel.islemag-template4-posts' ).owlCarousel(
									{
										loop: true,
										margin: 30,
										responsiveClass: true,
										nav: true,
										navText: ['<i class="fa fa-angle-left">', '<i class="fa fa-angle-right">'],
										dots: false,
										autoplay: true,
										autoplayTimeout: 17000,
										lazyLoad: true,
										responsive: {
											0: {items: 1},
											600: {items: 2},
											992: {items: 2}
										}
									}
								);
							}
						}
					);
				}
			);
		}
	);

	wp.customize(
		'islemag_single_post_hide_author', function (value) {
			value.bind(
				function (to) {
					if (true !== to) {
						$( '.about-author ' ).removeClass( 'islemag_hide' );
					} else {
						$( '.about-author ' ).addClass( 'islemag_hide' );
					}
				}
			);
		}
	);

	wp.customize(
		'islemag_single_post_hide_thumbnail', function (value) {
			value.bind(
				function (to) {
					if (true !== to) {
						$( '.post .entry-media' ).removeClass( 'islemag_only_customizer' );
					} else {
						$( '.post .entry-media' ).addClass( 'islemag_only_customizer' );
					}
				}
			);
		}
	);

	wp.customize(
		'islemag_footer_logo', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-footer-logo img' ).attr( 'src', to );
				}
			);
		}
	);

	wp.customize(
		'islemag_footer_link', function (value) {
			value.bind(
				function (to) {
					$( '.islemag-footer-logo' ).attr( 'href', to );
				}
			);
		}
	);

	wp.customize(
		'islemag_footer_text', function (value) {
			value.bind(
				function (to) {
					var escaped_content = islemag_strip_tags( to, '<p><br><em><strong><ul><li><a><button><address><abbr>' );
					$( '.islemag-footer-content' ).html( escaped_content );
				}
			);
		}
	);

	wp.customize(
		'islemag_footer_socials_title', function (value) {
			value.bind(
				function (to) {
					$( '.social-icons-label' ).text( to );
				}
			);
		}
	);

	wp.customize(
		'islemag_footer_social_icons', function (value) {
			value.bind(
				function (to) {
					var obj    = JSON.parse( to );
					var result = '';
					obj.forEach(
						function (item) {

							result += '<a href="' + item.link + '" class="footer-social-icon"><i class="fa ' + item.icon_value + '"></i></a>';

						}
					);
					$( '.footer-social-icons' ).html( result );
				}
			);
		}
	);

})( jQuery );
