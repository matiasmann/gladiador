<?php
/**
 * Add support for the Akismet plugin.
 *
 * @package Gladiador
 */

/**
 * Display Plugin Styles.
 */
function gladiador_akismet_styles() {

	if ( defined( 'JETPACK__VERSION' ) ) {
		gladiador_print_plugin_css( 'akismet' );
	}

}

add_action( 'wp_body_open', 'gladiador_akismet_styles' );
