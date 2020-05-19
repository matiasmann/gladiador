<?php
/**
 * Single Post & Page Template
 *
 * This is the default template for all single posts for all custom post types.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gladiador
 * @subpackage Template
 * @author Matias Mann <matias@developress.org>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

	get_header();

?>

	<main id="main" class="main-content content-single">

<?php

	if ( have_posts() ) {

		while ( have_posts() ) {

			the_post();
			get_template_part( 'parts/content-single', get_post_type() );
			get_template_part( 'parts/comments' );

		}
	} else {

		get_template_part( 'parts/content-empty' );

	}

	gladiador_related_posts();

?>

	</main>

<?php

	get_footer();
