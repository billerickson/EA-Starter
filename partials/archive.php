<?php
/**
 * Archive partial
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<article class="' . join( ' ', get_post_class() ) . '">';

	echo '<header class="entry-header">';
		ea_entry_title();
	echo '</header>';

	echo '<div class="entry-content">';
		the_excerpt();
	echo '</div>';

echo '</article>';
