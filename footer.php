<?php
/**
 * EA Starter
 *
 * @package      EAStarter
 * @since        1.0.0
 * @copyright    Copyright (c) 2014, Contributors to EA Genesis Child project
 * @license      GPL-2.0+
 */

?>
	<?php ea_structural_wrap( 'site-inner', 'close' ); ?>
	</div><!-- #content -->

	<?php tha_footer_before(); ?>	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php ea_structural_wrap( 'footer' ); ?>
		<?php tha_footer_top(); ?>
		<p>Copyright &copy; <?php echo date( 'Y' );?></p>
		<?php tha_footer_bottom(); ?>
	</footer><!-- #colophon -->
	<?php tha_footer_after(); ?>
	<?php ea_structural_wrap( 'footer', 'close' ); ?>
</div><!-- #page -->

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>

</body>
</html>
