<?php
/**
 * Custom control for Algori Blogger Documentation link.
 *
 * Class WP_Customize_Control is loaded only when theme customizer is acutally
 * used.
 * So, I've defined my custom class within the algori_blogger_customize_register
 * function that is binded to the 'customize_register' action.
 *
 * @link https://developer.wordpress.org/themes/customize-api/customizer-objects/#custom-controls-sections-and-panels.
 * @package Gladiador
 */

/**
 * Add a link to the theme docs.
 */
class Gladiador_Doc_Link extends WP_Customize_Control {

	/**
	 * The Control type.
	 * Has to be something unique.
	 *
	 * @var string
	 */
	public $type = 'gladiador_documentation_link';

	/**
	 * Render the control's content.
	 */
	public function render_content() {

?>

	<p><?php esc_html_e( 'Gladiador is designed to be simple and flexible. Most of the settings can be changed in the Customizer. For more details check out the following links:', 'gladiador' ); ?></p>
	<ul style="margin-bottom: 15px;">
	<li><a href="https://github.com/BinaryMoon/gladiador/wiki/Getting-Started"><?php esc_html_e( 'Getting Started', 'gladiador' ); ?></a></li>
	<li><a href="https://github.com/BinaryMoon/gladiador/wiki/Recommended-Plugins"><?php esc_html_e( 'Recommended Plugins', 'gladiador' ); ?></a></li>
	</ul>
	<a href="https://github.com/BinaryMoon/gladiador/wiki" class="button button-primary" id="gladiador-doc-link" target="_blank">
		<?php esc_html_e( 'Theme Documentation', 'gladiador' ); ?>
	</a>

<?php

	}

}
