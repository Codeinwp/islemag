jQuery( document ).ready(
	function() {

		/* If there are required actions, add an icon with the number of required actions in the About Islemag page -> Actions required tab */
		var islemag_nr_actions_required = islemagWelcomeScreenObject.nr_actions_required;

		if ( (typeof islemag_nr_actions_required !== 'undefined') && (islemag_nr_actions_required != '0') ) {
			jQuery( 'li.islemag-w-red-tab a' ).append( '<span class="islemag-actions-count">' + islemag_nr_actions_required + '</span>' );
		}

		/* Dismiss required actions */
		jQuery( ".islemag-dismiss-required-action" ).click(
			function(){

				var id = jQuery( this ).attr( 'id' );
				console.log( id );
				jQuery.ajax(
					{
						type       : "GET",
						data       : { action: 'islemag_dismiss_required_action',dismiss_id : id },
						dataType   : "html",
						url        : islemagWelcomeScreenObject.ajaxurl,
						beforeSend : function(data,settings){
							jQuery( '.islemag-tab-pane#actions_required h1' ).append( '<div id="temp_load" style="text-align:center"><img src="' + islemagWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>' );
						},
						success    : function(data){
							jQuery( "#temp_load" ).remove(); /* Remove loading gif */
							jQuery( '#' + data ).parent().remove(); /* Remove required action box */

							var islemag_actions_count = jQuery( '.islemag-actions-count' ).text(); /* Decrease or remove the counter for required actions */
							if ( typeof islemag_actions_count !== 'undefined' ) {
								if ( islemag_actions_count == '1' ) {
									jQuery( '.islemag-actions-count' ).remove();
									jQuery( '.islemag-tab-pane#actions_required' ).append( '<p>' + islemagWelcomeScreenObject.no_required_actions_text + '</p>' );
								} else {
									jQuery( '.islemag-actions-count' ).text( parseInt( islemag_actions_count ) - 1 );
								}
							}
						},
						error     : function(jqXHR, textStatus, errorThrown) {
							console.log( jqXHR + " :: " + textStatus + " :: " + errorThrown );
						}
					}
				);
			}
		);

		/* Tabs in welcome page */
		function islemag_welcome_page_tabs(event) {
			jQuery( event ).parent().addClass( "active" );
			jQuery( event ).parent().siblings().removeClass( "active" );
			var tab = jQuery( event ).attr( "href" );
			jQuery( ".islemag-tab-pane" ).not( tab ).css( "display", "none" );
			jQuery( tab ).fadeIn();
		}

		var islemag_actions_anchor = location.hash;

		if ( (typeof islemag_actions_anchor !== 'undefined') && (islemag_actions_anchor != '') ) {
			islemag_welcome_page_tabs( 'a[href="' + islemag_actions_anchor + '"]' );
		}

		jQuery( ".islemag-nav-tabs a" ).click(
			function(event) {
				event.preventDefault();
				islemag_welcome_page_tabs( this );
			}
		);

		/* Tab Content height matches admin menu height for scrolling purpouses */
		$tab               = jQuery( '.islemag-tab-content > div' );
		$admin_menu_height = jQuery( '#adminmenu' ).height();
		if ( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') ) {
			$newheight = $admin_menu_height - 180;
			$tab.css( 'min-height',$newheight );
		}

	}
);
