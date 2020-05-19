<?php
/**
 * Allow users to edit footer credits.
 *
 * @package Gladiador
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Theme Credits Customizer properties
 *
 * @param WP_Customize_Manager $wp_customize WP Customize object. Passed by WordPress.
 */
function gladiador_customizer_credits( WP_Customize_Manager $wp_customize ) {

	$default_footer = '(privacy)(|)(ptd)(|)(top)';

	$description = array(
		'<p>' . __( 'The footer credits area supports <strong>HTML</strong>. It also supports the following tags:', 'gladiador' ) . '</p>',
		'<ul>',
		'<li>' . __( '<strong>(c)</strong>: the copyright symbol &copy;', 'gladiador' ) . '</li>',
		'<li>' . __( '<strong>(year)</strong>: the current year. Updates automatically', 'gladiador' ) . '</li>',
		'<li>' . __( '<strong>(|)</strong>: add a gap between items', 'gladiador' ) . '</li>',
		'<li>' . __( '<strong>(privacy)</strong>: a privacy policy link', 'gladiador' ) . '</li>',
		'<li>' . __( '<strong>(feed)</strong>: a link to the site RSS Feed', 'gladiador' ) . '</li>',
		'<li>' . __( '<strong>(top)</strong>: a "back to top" link', 'gladiador' ) . '</li>',
		'<li>' . __( '<strong>(ptd)</strong>: the Pro Theme Design credit', 'gladiador' ) . '</li>',
		'</ul>',
		// translators: %s = the default footer content.
		'<p>' . sprintf( __( 'The default theme footer can be reproduced with:<br /><strong>%s</strong>', 'gladiador' ), $default_footer ) . '</p>',
		'<p class="section-description-buttons">',
		'<button type="button" class="button-link section-description-close">' . __( 'Close', 'gladiador' ) . '</button>',
		'</p>',
	);

	$description = apply_filters( 'gladiador_customizer_credits_description', $description );

	/**
	 * Gladiador theme options section.
	 */
	$wp_customize->add_section(
		'gladiador_credits',
		array(
			'title' => esc_html__( 'Footer Credits', 'gladiador' ),
			'description' => implode( $description, '' ),
			'description_hidden' => true,
			'panel' => 'gladiador_site_layout',
		)
	);

	/**
	 * Setting to allow the credits to be hidden.
	 */
	$wp_customize->add_setting(
		'gladiador_credits_content',
		array(
			'default' => $default_footer,
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_credits_content',
		array(
			'label' => esc_html__( 'Credits Content', 'gladiador' ),
			'section' => 'gladiador_credits',
			'type' => 'textarea',
		)
	);

}


/**
 * Update Credits without doing a full page refresh.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function gladiador_register_customize_refresh_credits( WP_Customize_Manager $wp_customize ) {

	// Ensure selective refresh is enabled.
	if ( ! isset( $wp_customize->selective_refresh ) ) {

		return false;

	}

	// Update credits content.
	$wp_customize->selective_refresh->add_partial(
		'gladiador_credits_content',
		array(
			'selector' => '.site-info',
			'render_callback' => function() {
				gladiador_credits_content( false );
			},
		)
	);

}

