<?php
/**
 * Child page grid Template
 *
 * Displays children of the current page as a grid below the page content.
 *
 * Template Name: Child Page Grid
 *
 * @package Gladiador
 * @subpackage PageTemplate
 * @author Ben Gillbanks <ben@prothemedesign.com>
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

		}
	}

?>

	</main>

<?php
	// Get a list of the children for the current page.
	$child_pages = gladiador_child_pages();

	// If there are any children then display them below in a grid.
	if ( $child_pages->have_posts() ) {
?>

	<section class="main-content entry-children content-posts">

<?php

		while ( $child_pages->have_posts() ) {

			$child_pages->the_post();
			get_template_part( 'parts/content' );

		}

?>

	</section>

<?php

	}

	wp_reset_postdata();

	get_footer();
