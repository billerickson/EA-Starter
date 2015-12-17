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
	</div>

	<?php tha_footer_before(); ?>	
	<footer class="site-footer" role="contentinfo">
		<?php ea_structural_wrap( 'footer' ); ?>
		<?php tha_footer_top(); ?>
		<p>Copyright &copy; <?php echo date( 'Y' );?></p>
		<?php tha_footer_bottom(); ?>
	</footer>
	<?php tha_footer_after(); ?>
	<?php ea_structural_wrap( 'footer', 'close' ); ?>
</div>

<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>

</body>
</html>
