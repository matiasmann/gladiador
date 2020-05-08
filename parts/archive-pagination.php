<?php
/**
 * Archive Pagination
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

	the_posts_pagination(
		array(
			'mid_size' => 2,
			'prev_text' => esc_html__( 'Newer', 'gladiador' ),
			'next_text' => esc_html__( 'Older', 'gladiador' ),
			'before_page_number' => '<span class="screen-reader-text"> ' . esc_html__( 'page', 'gladiador' ) . ' </span>',
		)
	);
