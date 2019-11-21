<?php
/**
 * Site Footer
 *
 * @package      EAStarter
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '</div>'; // .site-inner
tha_footer_before();
echo '<footer class="site-footer" role="contentinfo"><div class="wrap">';
tha_footer_top();
tha_footer_bottom();
echo '</div></footer>';
tha_footer_after();

echo '</div>';
tha_body_bottom();
wp_footer();

echo '</body></html>';
