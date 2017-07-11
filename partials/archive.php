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
		tha_entry_top();
	echo '</header>';

	echo '<div class="entry-content">';
		tha_entry_content_before();
		the_excerpt();
		tha_entry_content_after();
	echo '</div>';

	echo '<footer class="entry-footer">';
		tha_entry_bottom();
	echo '</footer>';

echo '</article>';
