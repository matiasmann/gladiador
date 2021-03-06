/**
 * Live updates for the site description.
 */
; ( function( $ ) {

	wp.customize.bind(
		'preview-ready',
		function() {

			// Edit Header Layout.
			wp.customize(
				'gladiador_header_layout',
				function( value ) {
					value.bind(
						function( to ) {

							var count = 2;
							var selectors = '';

							for ( i = 0; i <= count; i++ ) {
								selectors += ' header-layout-' + i;
							}

							$( 'body' )
								.removeClass( selectors )
								.addClass( 'header-layout-' + to );

						}
					);
				}
			);

			// Fired by gladiador_header expansion.
			wp.customize.preview.bind(
				'gladiador_header_expand',
				function( data ) {

					// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
					if ( true === data.expanded ) {
						scroll_to( '.site-header' );
					}

				}
			);


			// Edit Archive Header Height.
			wp.customize(
				'gladiador_archive_header_height',
				function( value ) {
					value.bind(
						header_height
					);
				}
			);

			// Edit Single Header Height.
			wp.customize(
				'gladiador_single_header_height',
				function( value ) {
					value.bind(
						header_height
					);
				}
			);

			var hide_element = {
				'clip': 'rect(1px, 1px, 1px, 1px)',
				'position': 'absolute'
			};

			var show_element = {
				'clip': 'auto',
				'position': 'relative'
			};

			// Edit Site title display.
			wp.customize(
				'gladiador_site_title',
				function( value ) {
					value.bind(
						function( display ) {

							switch ( parseInt( display ) ) {

								// Hide the site description.
								case 1:

									$( '.branding .site-title' ).css( show_element );
									$( '.branding .site-description' ).css( hide_element );

									break;

								// Hide everything.
								case 2:

									$( '.branding .site-title, .branding .site-description' ).css( hide_element );

									break;

								// Show everything.
								default:

									$( '.branding .site-title, .branding .site-description' ).css( show_element );

							}

						}
					);
				}
			);

		}
	);

	/**
	 * Set the body class for the header height.
	 *
	 * @param {string} to The new value to set the property to.
	 */
	var header_height = function( to ) {

		var count = 2;
		var selectors = '';

		for ( i = 0; i <= count; i++ ) {
			selectors += ' header-height-' + i;
		}

		$( 'body' )
			.removeClass( selectors )
			.addClass( 'header-height-' + to );

	};

	/**
	 * Scroll the page to the specified element.
	 *
	 * @param  {string} e CSS element identifier.
	 * @return {boolean}
	 */
	var scroll_to = function( e ) {

		var $target = $( e );

		if ( $target.length ) {
			var targetOffset = $target.offset().top - parseInt( $( 'html' ).css( 'margin-top' ) );
			$( 'html,body' ).animate( { scrollTop: targetOffset }, 750 );
		}

		return false;

	};

} )( jQuery );