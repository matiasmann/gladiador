<?php
/**
 * Post Meta Data
 *
 * @package Gladiador
 * @subpackage TemplatePart
 * @author Ben Gillbanks <ben@prothemedesign.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

?>

	<div class="entry-meta">

<?php

	gladiador_post_time();

	gladiador_post_author();

	gladiador_comments_link();

	get_template_part( 'parts/edit-post' );

?>

	</div>
