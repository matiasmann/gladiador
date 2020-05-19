<?php
/**
 * Default settings.
 *
 * @package Gladiador
 * @subpackage ThemeCustomizerSettings
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Theme Customizer properties
 *
 * @param WP_Customize_Manager $wp_customize WP Customize object. Passed by WordPress.
 */
function gladiador_customizer_settings( WP_Customize_Manager $wp_customize ) {

	/**
	 * Gladiador site layout.
	 */
	$wp_customize->add_panel(
		'gladiador_site_layout',
		array(
			'title' => esc_html__( 'Site Layout', 'gladiador' ),
			'priority' => 55,
		)
	);

	/**
	 * Add a link to the theme documentation on Github.
	 */
	$wp_customize->add_section(
		'gladiador_docs',
		array(
			'title' => esc_html__( 'Gladiador Theme Documentation', 'gladiador' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
		new Gladiador_Doc_Link(
			$wp_customize,
			'gladiador_documentation',
			array(
				'section' => 'gladiador_docs',
				'settings' => array(),
			)
		)
	);

	/**
	 * Add panels in the order they should appear.
	 */
	gladiador_customizer_header( $wp_customize );

	gladiador_customizer_archive( $wp_customize );

	gladiador_customizer_single( $wp_customize );

	gladiador_customizer_credits( $wp_customize );
	gladiador_register_customize_refresh_credits( $wp_customize );

}

add_action( 'customize_register', 'gladiador_customizer_settings' );


/**
 * Update Theme Elements without refreshing content.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function gladiador_register_customize_refresh( WP_Customize_Manager $wp_customize ) {

	// Ensure selective refresh is enabled.
	if ( ! isset( $wp_customize->selective_refresh ) ) {

		return false;

	}

	// Update site title.
	$setting = $wp_customize->get_setting( 'blogname' );
	if ( $setting instanceof WP_Customize_Setting ) {
		$setting->transport = 'postMessage';
	}

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector' => '.site-title',
			'render_callback' => function() {
				bloginfo( 'name' );
			},
		)
	);

	// Update site description.
	$setting = $wp_customize->get_setting( 'blogdescription' );
	if ( $setting instanceof WP_Customize_Setting ) {
		$setting->transport = 'postMessage';
	}

	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector' => '.site-description',
			'render_callback' => function() {
				bloginfo( 'description' );
			},
		)
	);

	// Show and hide header text.
	$setting = $wp_customize->get_setting( 'header_textcolor' );
	if ( $setting instanceof WP_Customize_Setting ) {
		$setting->transport = 'postMessage';
	}

}

add_action( 'customize_register', 'gladiador_register_customize_refresh' );


/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 */
function gladiador_customize_preview_js() {

	$script_path = get_theme_file_uri( '/assets/scripts/customizer-preview.min.js' );

	if ( WP_DEBUG ) {
		$script_path = get_theme_file_uri( '/assets/scripts/customizer-preview.js' );
	}

	wp_enqueue_script(
		'gladiador-customize-preview',
		$script_path,
		array( 'customize-preview', 'jquery' ),
		gladiador_get_theme_version( '/assets/scripts/customizer-preview.js' ),
		true
	);

	wp_add_inline_script( 'gladiador-customize-preview', gladiador_get_font_json() );

}

add_action( 'customize_preview_init', 'gladiador_customize_preview_js' );


/**
 * Binds JS handlers to load the Customizer controls js.
 */
function gladiador_customize_controls_js() {

	$script_path = get_theme_file_uri( '/assets/scripts/customizer-controls.min.js' );

	if ( WP_DEBUG ) {
		$script_path = get_theme_file_uri( '/assets/scripts/customizer-controls.js' );
	}

	wp_enqueue_script(
		'gladiador-customize-controls',
		$script_path,
		array( 'jquery' ),
		gladiador_get_theme_version( '/assets/scripts/customizer-controls.js' ),
		true
	);

	wp_enqueue_style(
		'gladiador-customizer-styles',
		get_theme_file_uri( '/assets/css/customizer.css' ),
		array(),
		gladiador_get_theme_version( '/assets/css/customizer.css' )
	);

}

add_action( 'customize_controls_enqueue_scripts', 'gladiador_customize_controls_js' );

