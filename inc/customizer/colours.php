<?php
/**
 * Allow users to edit the colours used on their website.
 *
 * @package Gladiador
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

/**
 * Theme Colours Customizer properties
 *
 * @param WP_Customize_Manager $wp_customize WP Customize object. Passed by WordPress.
 */
function gladiador_customizer_colours( WP_Customize_Manager $wp_customize ) {

	/**
	 * Light mode background colour
	 */
	$wp_customize->add_setting(
		'gladiador_light_mode_colour',
		array(
			'default' => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gladiador_light_mode_colour',
			array(
				'label' => esc_html__( 'Light Mode background color', 'wp-toolbelt' ),
				'description' => esc_html__( 'The default background color.', 'wp-toolbelt' ),
				'section' => 'colors',
			)
		)
	);

	/**
	 * Dark mode background colour.
	 */
	$wp_customize->add_setting(
		'gladiador_dark_mode',
		array(
			'default' => false,
			'sanitize_callback' => 'gladiador_sanitize_checkbox',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'gladiador_dark_mode',
		array(
			'label' => esc_html__( 'Use Dark Mode Colour', 'wp-toolbelt' ),
			'section' => 'colors',
			'type' => 'checkbox',
		)
	);

	/**
	 * Dark mode background colour.
	 */
	$wp_customize->add_setting(
		'gladiador_dark_mode_colour',
		array(
			'default' => '#004466',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport' => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'gladiador_dark_mode_colour',
			array(
				'label' => esc_html__( 'Dark Mode background color', 'wp-toolbelt' ),
				'description' => esc_html__( 'This will be selected automatically for users who are using dark mode in their operating system.', 'wp-toolbelt' ),
				'section' => 'colors',
			)
		)
	);

}

add_action( 'customize_register', 'gladiador_customizer_colours' );
