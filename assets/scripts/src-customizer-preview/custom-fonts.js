/**
 * Live updates for the site description.
 */
; ( function( $ ) {

	wp.customize.bind(
		'preview-ready',
		function() {

			// Edit Title font.
			wp.customize(
				'gladiador_title_font',
				function( value ) {
					value.bind(
						function( to ) {
							document.body.style.setProperty( '--font-title', gladiador_fonts[ to ][ 1 ] );
						}
					);
				}
			);

			// Edit Header font.
			wp.customize(
				'gladiador_header_font',
				function( value ) {
					value.bind(
						function( to ) {
							document.body.style.setProperty( '--font-header', gladiador_fonts[ to ][ 1 ] );
						}
					);
				}
			);

			// Edit Body font.
			wp.customize(
				'gladiador_body_font',
				function( value ) {
					value.bind(
						function( to ) {
							document.body.style.setProperty( '--font-body', gladiador_fonts[ to ][ 1 ] );
						}
					);
				}
			);

			// Edit Meta font.
			wp.customize(
				'gladiador_meta_font',
				function( value ) {
					value.bind(
						function( to ) {
							document.body.style.setProperty( '--font-meta', gladiador_fonts[ to ][ 1 ] );
						}
					);
				}
			);

		}
	);

} )( jQuery );