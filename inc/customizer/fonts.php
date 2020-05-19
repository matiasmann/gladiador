<?php
/**
 * Allow users to edit the fonts on their website.
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
function gladiador_customizer_fonts( WP_Customize_Manager $wp_customize ) {

	/**
	 * Gladiador theme options section.
	 */
	$wp_customize->add_section(
		'gladiador_fonts',
		array(
			'title' => esc_html__( 'Fonts', 'gladiador' ),
			'priority' => 50,
		)
	);

	/**
	 * Setting to change the title font.
	 */
	$wp_customize->add_setting(
		'gladiador_title_font',
		array(
			'default' => 'cambria',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_fonts',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Gladiador_Font_Selector(
			$wp_customize,
			'gladiador_title_font',
			array(
				'choices' => gladiador_get_fonts(),
				'label' => esc_html__( 'Title Font', 'gladiador' ),
				'section' => 'gladiador_fonts',
				'default-font' => 'Cambria',
			)
		)
	);

	/**
	 * Setting to change the heading font.
	 */
	$wp_customize->add_setting(
		'gladiador_header_font',
		array(
			'default' => 'cambria',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_fonts',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Gladiador_Font_Selector(
			$wp_customize,
			'gladiador_header_font',
			array(
				'choices' => gladiador_get_fonts(),
				'label' => esc_html__( 'Heading Font', 'gladiador' ),
				'section' => 'gladiador_fonts',
				'default-font' => 'Cambria',
			)
		)
	);

	/**
	 * Setting to change the body font.
	 */
	$wp_customize->add_setting(
		'gladiador_body_font',
		array(
			'default' => 'cambria',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_fonts',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Gladiador_Font_Selector(
			$wp_customize,
			'gladiador_body_font',
			array(
				'choices' => gladiador_get_fonts(),
				'label' => esc_html__( 'Body Font', 'gladiador' ),
				'section' => 'gladiador_fonts',
				'default-font' => 'Cambria',
			)
		)
	);

	/**
	 * Setting to change the body font.
	 */
	$wp_customize->add_setting(
		'gladiador_meta_font',
		array(
			'default' => 'cambria',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'gladiador_sanitize_fonts',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new Gladiador_Font_Selector(
			$wp_customize,
			'gladiador_meta_font',
			array(
				'choices' => gladiador_get_fonts(),
				'label' => esc_html__( 'Meta Font', 'gladiador' ),
				'section' => 'gladiador_fonts',
				'default-font' => 'Cambria',
			)
		)
	);

}

add_action( 'customize_register', 'gladiador_customizer_fonts' );
