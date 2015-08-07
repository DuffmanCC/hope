<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package agw
 */
?>
			<?php if( !is_front_page() ): ?>
			</div><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
			<?php endif; ?>
			
		</div><!-- close .row -->
	</div><!-- close .container or .container-fluid -->
</div><!-- close .main-content -->

<footer id="colophon" class="site-footer" role="contentinfo">

	<div class="container-fluid">
		<div class="row">
			<div class="site-footer-inner col-sm-12">

				<?php if( !dynamic_sidebar( 'Footer left' ) ): ?>
        
		        <h3>Insert footer information</h3>

		    	<?php endif; ?>

		    	<?php if( !dynamic_sidebar( 'Footer right' ) ): ?>
		        
		        <h3>Insert social icons</h3>

		    	<?php endif; ?>

			</div>
		</div>
	</div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>
